<?php
/**
 * Class Autologin
 */

class Autologin
{
    /**
     * @return array
     */
    function credentials()
    {
        $host = isset($_ENV['MYSQL_HOST']) ? $_ENV['MYSQL_HOST'] : 'mysql';
        $user = 'root';
        $pass = $_ENV['MYSQL_ROOT_PASSWORD'];

        return array($host, $user, $pass);
    }

    /**
     * @return mixed
     */
    function database()
    {
        return isset($_ENV['MYSQL_DATABASE']) ? $_ENV['MYSQL_DATABASE'] : '';
    }

    /**
     * @return bool
     */
    function loginForm()
    {
        $host = isset($_ENV['MYSQL_HOST']) ? $_ENV['MYSQL_HOST'] : 'mysql';
        $user = 'root';
        $pass = $_ENV['MYSQL_ROOT_PASSWORD'];
        $name = isset($_ENV['MYSQL_DATABASE']) ? $_ENV['MYSQL_DATABASE'] : '';
        ?>
        <table cellspacing="0">
            <select name='auth[driver]'><option value="server" selected>MySQL</select>
            <tr><th>Server<td><input name="auth[server]" value="<?=$host?>" title="hostname[:port]" autocapitalize="off">
            <tr><th>Username<td><input name="auth[username]" id="username" value="<?=$user?>" autocapitalize="off">
            <tr><th>Password<td><input type="password" name="auth[password]" value="<?=$pass?>">
            <tr><th>Database<td><input name="auth[db]" value="<?=$name?>" autocapitalize="off" placeholder="Database">
        </table>
        <p><input id="submit-button" type="submit" value="<?php echo lang('Login'); ?>">
        <script>
            setTimeout(function() {
                document.getElementById("submit-button").click()
            }, 1000);
        </script>
        <?php
        echo checkbox("auth[permanent]", 1, $_COOKIE["adminer_permanent"], lang('Permanent login')) . "\n";

        return true;
    }
}

// return singleton module
return new Autologin();
