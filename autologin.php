<?php
/**
 * autologin plugin for adminer.
 */
return new class() {
    /**
     * Print login form with autologin javascript.
     *
     * @return bool
     */
    public function loginForm()
    {
        $once = $_SESSION['once-autologin'] ?? false;
        $_SESSION['once-autologin'] = true;

        if (isset($_ENV['SA_PASSWORD']) || isset($_ENV['MSSQL_SA_PASSWORD'])) {
            $host = $_ENV['MSSQL_HOST'] ?? 'mssql';
            $name = $_ENV['MSSQL_DATABASE'] ?? '';
            $user = 'sa';
            $pass = $_ENV['SA_PASSWORD'] ?? $_ENV['MSSQL_SA_PASSWORD'];
        } else {
            $host = $_ENV['MYSQL_HOST'] ?? 'mysql';
            $name = $_ENV['MYSQL_DATABASE'] ?? '';
            if (isset($_ENV['MYSQL_ROOT_PASSWORD'])) {
                $user = 'root';
                $pass = $_ENV['MYSQL_ROOT_PASSWORD'];
            } else {
                $user = $_ENV['MYSQL_USER'] ?? 'root';
                $pass = $_ENV['MYSQL_PASSWORD'] ?? '';
            }
        }
        ?>

        <table cellspacing="0">
            <select name='auth[driver]'><option value="server" selected>MySQL</select>
            <tr><th>Server<td><input name="auth[server]" value="<?=$host?>" title="hostname[:port]" autocapitalize="off">
            <tr><th>Username<td><input name="auth[username]" id="username" value="<?=$user?>" autocapitalize="off">
            <tr><th>Password<td><input type="password" name="auth[password]" value="<?=$pass?>">
            <tr><th>Database<td><input name="auth[db]" value="<?=$name?>" autocapitalize="off" placeholder="Database">
        </table>
        <p><input id="submit-button" type="submit" value="<?php echo lang('Login'); ?>">

        <?php
        echo checkbox('auth[permanent]', 1, $_COOKIE['adminer_permanent'], lang('Permanent login'));
        if (!$once) {
            ?>
            <input type="hidden" name="autologin" value="disabled">
            <script <?=nonce()?> type="text/javascript">
                setTimeout(function() {
                    document.getElementById("submit-button").click()
                }, 1000);
            </script>
            <?php
        }

        return true;
    }
};
