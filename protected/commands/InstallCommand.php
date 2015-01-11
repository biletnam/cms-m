<?php

/**
 * Class InstallCommand
 */
class InstallCommand extends CConsoleCommand
{
    /**
     * Shows info message
     *
     * @param string $msg
     * @param string $end
     */
    private function msg($msg, $end = "\n")
    {
        echo $msg . $end;
    }

    /**
     * Set permissions
     *
     * @param            $path
     * @param            $permission
     * @param bool|false $recursive
     *
     * @return bool
     */
    private function setPermission($path, $permission, $recursive = false)
    {
        if (!file_exists($path) or !is_dir($path))
            return false;

        if ($recursive)
        {
            if ($folders = array_slice(scandir($path), 2))
            {
                foreach($folders as $folder)
                {
                    $this->setPermission($path . "/". $folder, $permission, true);
                }
            }
        }
        chmod($path, octdec($permission));

        return true;
    }

    /**
     * Create local config file
     *
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     * @param bool $rewrite
     */
    public function actionLocal($host = 'localhost', $dbname = 'dbname', $username = 'username', $password = 'password', $rewrite = 0)
    {
        $template = 'protected/data/local.php.template';
        $file = 'protected/config/local.php';
        if (file_exists($template))
        {
            if (!$rewrite and file_exists($file))
            {
                $this->msg("Install(local): File already exists.");
            }
            else
            {
                @unlink($file);
                $content = file_get_contents($template);
                file_put_contents($file, strtr($content, array(
                    '{host}' => $host,
                    '{dbname}' => $dbname,
                    '{username}' => $username,
                    '{password}' => $password,
                )));
                $this->msg("Install(local): Successfully create local file.");
            }
        }
        else
        {
            $this->msg('Install(local): Template file not found.');
        }
    }

    /**
     * Create db from dump file
     *
     * @return bool
     */
    public function actionDb()
    {
        $sql = 'protected/data/shop-plusonecms.sql';
        if (file_exists($sql))
        {
            try
            {
                $db = Yii::app()->db;
                $db->createCommand(file_get_contents($sql))->execute();
                $this->msg("Install(db): Successfully install database.");
            }
            catch (Exception $e)
            {
                $this->msg("Install(db): DB connection not correct. Check your local config.");
                $this->msg("Error:" . $e->getMessage());
            }
        }
        else
        {
            $this->msg('Install(db): Database dump not found.');
        }
    }


    public function actionPermission($permission = 777)
    {
        $paths = array(
            'protected/runtime' => false,
            'www/assets' => false,
            'www/upload' => true,
        );

        foreach ($paths as $path => $recursive) {
            if ($this->setPermission($path, $permission, $recursive))
                $this->msg("Install(permission): '" . $path . "' " . ($recursive ? "(r)" : "") . " -> " . $permission . ".");
            else
                $this->msg("Install(permission): '" . $path . "' failed to set permission.");
        }
    }

    /**
     * Extract upload folder from zip archive
     */
    public function actionUpload()
    {
        $archive = 'protected/data/upload.zip';
        $dest = 'www';
        if (file_exists($archive))
        {
            $zip = new ZipArchive;
            if ($zip->open($archive) === true)
            {
                $zip->extractTo($dest);
                $zip->close();
                $this->msg("Install(upload): Successfully extract upload archive.");
            }
            else
                $this->msg("Install(upload): Failed to extract upload archive.");
        }
        else
        {
            $this->msg('Install(upload): Upload archive not found.');
        }
    }

    /**
     * Run base commands
     */
    public function actionIndex()
    {
        $this->actionLocal();
        $this->actionPermission();
        $this->actionUpload();
    }
}