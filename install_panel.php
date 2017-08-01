<?php

$we_root = trim(shell_exec("whoami"));
if (strcmp($we_root, "root") !== 0) {
    echo "Please execute this script as root! Exitting...";
    exit;
}

echo "FOS: Checking for existing installations!\r";
shell_exec("killall -9 ffmpeg php5-fpm php-fpm nginx nginx_fos > /dev/null");
shell_exec("service php5-fpm stop > /dev/null");
shell_exec("rm -rf /usr/src/FOS-Streaming/* > /dev/null");
shell_exec("rm -rf /usr/src/FOS-Streaming/./.* > /dev/null");
shell_exec("umount /home/fos-streaming/fos/www/streams > /dev/null");
shell_exec("umount /home/fos-streaming/fos/www/cache > /dev/null");
shell_exec("rm -rf /home/fos-streaming > /dev/null");
shell_exec("deluser fosstreaming -q");
shell_exec("delgroup fosstreaming -q");

function InstallSources($CodeName) {
    echo "FOS: Sources ($CodeName)...\n";
    switch ($CodeName) {
        case 'wheezy':
            shell_exec("echo 'deb http://ftp.de.debian.org/debian stable main contrib non-free' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.de.debian.org/debian stable main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://ftp.debian.org/debian/ wheezy-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.debian.org/debian/ wheezy-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://security.debian.org/ wheezy/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://security.debian.org/ wheezy/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case 'squeeze':
            shell_exec("echo 'deb http://archive.debian.org/debian oldstable main contrib non-free' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://archive.debian.org/debian oldstable main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://ftp.debian.org/debian/ squeeze-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.debian.org/debian/ squeeze-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://security.debian.org/ squeeze/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://security.debian.org/ squeeze/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case "jessie":
            shell_exec("echo 'deb http://ftp.fr.debian.org/debian testing main contrib non-free' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.fr.debian.org/debian testing main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://ftp.debian.org/debian/ jessie-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.debian.org/debian/ jessie-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://security.debian.org/ jessie/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://security.debian.org/ jessie/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case "sid":
            shell_exec("echo 'deb http://ftp.us.debian.org/debian unstable main contrib non-free' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.us.debian.org/debian unstable main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://ftp.debian.org/debian/ Sid-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.debian.org/debian/ Sid-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://security.debian.org/ Sid/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://security.debian.org/ Sid/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case 'trusty':
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty main restricted universe multiverse' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case 'utopic':
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic main restricted universe multiverse' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case 'saucy':
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy main restricted universe multiverse' > /etc/apt/sources.list.d/fos_streaming.list'");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;
        
        case "wily":
            shell_exec("echo '###### Ubuntu Main Repos' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ wily main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ wily main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo '###### Ubuntu Update Repos' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ wily-security main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ wily-updates main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ wily-proposed main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ wily-security main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ wily-updates main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ wily-proposed main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo '###### Ubuntu Partner Repo' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://archive.canonical.com/ubuntu wily partner' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://archive.canonical.com/ubuntu wily partner' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;
        
        case "vivid":
            shell_exec("echo '###### Ubuntu Main Repos' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ vivid main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ vivid main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo '###### Ubuntu Update Repos' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ vivid-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ vivid-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ vivid-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ vivid-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ vivid-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ vivid-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo '###### Ubuntu Partner Repo' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://archive.canonical.com/ubuntu vivid partner' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://archive.canonical.com/ubuntu vivid partner' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;
        
        default:
            return true;
    }
    return true;
}

$release_info = shell_exec("lsb_release -i -s");
$arch = shell_exec("uname -m");
echo "Welcome \n";
echo "FOS-Streaming will be installed on your system \n";
echo "Please don't close this session until it's finished \n \n";
echo "1. [Distribution Detection:] ";
echo " [############";

if (strcmp($release_info, "Ubuntu") || strcmp($release_info, "Debian")) {
    echo "]PASS \n";
    $CodeName = trim(strtolower(shell_exec('lsb_release -c -s')));
    if (!file_exists("/etc/apt/sources.list.d/fos_streaming.list")) {
        InstallSources($CodeName);
    }
    echo "Updating newly added sources, please hold...";
    shell_exec("apt-get update > /dev/null");
} else {
    echo "]FAIL. Need Ubuntu or Debian!!! \n";
    exit();
}

shell_exec("/usr/sbin/useradd -s /sbin/nologin -U -d /home/fos-streaming -m fosstreaming");

shell_exec("mkdir /home/fos-streaming/fos");
shell_exec("mkdir /home/fos-streaming/fos/www");


if (!file_exists("/usr/src/FOS-Streaming")) {
    shell_exec("mkdir /usr/src/FOS-Streaming");
}


echo "##";

function GetFos() {
    shell_exec("rm -rf /usr/src/FOS-Streaming/*");
    shell_exec("git clone https://github.com/iphobe/IPTV-MD.git /usr/src/FOS-Streaming/ > /dev/null");
    shell_exec("mv /usr/src/FOS-Streaming/* /home/fos-streaming/fos/www/  > /dev/null");
    if (!file_exists("/usr/bin/composer.phar")) {
        shell_exec("wget https://getcomposer.org/installer -O /tmp/installer  > /dev/null");
        shell_exec("/usr/bin/php /tmp/installer --quiet");
        shell_exec("/bin/cp /tmp/composer.phar /usr/bin/composer.phar  > /dev/null");
    }
    shell_exec("chmod +x /usr/bin/composer.phar");
    shell_exec("/usr/bin/composer.phar install -d /home/fos-streaming/fos/www/ --quiet");
}

function AddSudo() {
    $ffmpeg_sudo = shell_exec("cat /etc/sudoers | grep -v grep | grep -c 'ffmpeg'");
    if ($ffmpeg_sudo == 0) {
        shell_exec("echo 'fosstreaming ALL = (root) NOPASSWD: /usr/local/bin/ffmpeg' >> /etc/sudoers");
        shell_exec("echo 'fosstreaming ALL = (root) NOPASSWD: /usr/local/bin/ffprobe' >> /etc/sudoers");
        shell_exec("echo '*/2 * * * * fosstreaming /usr/bin/php /home/fos-streaming/fos/www/cron.php' >> /etc/crontab");
    }
}

function AddRCLocal() {
    shell_exec("sed --in-place '/exit 0/d' /etc/rc.local");
    $nginx_bin = shell_exec("cat /etc/rc.local | grep -v grep | grep -c 'nginx_fos'");
    if ($nginx_bin == 0) {
        shell_exec("echo '/home/fos-streaming/fos/nginx/sbin/nginx_fos' >> /etc/rc.local");
    }
    $phpfpm_bin = shell_exec("cat /etc/rc.local | grep -v grep | grep -c 'php-fpm'");
    if ($phpfpm_bin == 0) {
        shell_exec("echo '/home/fos-streaming/fos/php/sbin/php-fpm' >> /etc/rc.local");
    }
    shell_exec("echo 'sleep 10' >> /etc/rc.local");
    shell_exec("echo 'exit 0' >> /etc/rc.local");
}

function BuildWeb() {
    if (!file_exists("/home/fos-streaming/fos/www/cache")) {
        shell_exec("mkdir /home/fos-streaming/fos/www/cache");
    }
    if (!file_exists("/home/fos-streaming/fos/www/streams")) {
        shell_exec("mkdir /home/fos-streaming/fos/www/streams");
    }


    $fstab_streams = shell_exec("cat /etc/fstab | grep -v grep | grep -c 'fos-streaming/fos/www/streams'");
    if ($fstab_streams == 0) {
        shell_exec("echo 'tmpfs /home/fos-streaming/fos/www/streams tmpfs defaults,noatime,nosuid,nodev,noexec,mode=1777,size=85% 0 0' >> /etc/fstab");
    }

    $fstab_cache = shell_exec("cat /etc/fstab | grep -v grep | grep -c 'fos-streaming/fos/www/cache'");
    if ($fstab_cache == 0) {

        shell_exec("echo 'tmpfs /home/fos-streaming/fos/www/cache tmpfs defaults,noatime,nosuid,nodev,noexec,mode=1777,size=500M 0 0' >> /etc/fstab");
    }
    shell_exec("chown -R fosstreaming:fosstreaming /home/fos-streaming");
    shell_exec("/home/fos-streaming/fos/php/sbin/php-fpm");
    shell_exec("/home/fos-streaming/fos/nginx/sbin/nginx_fos");
}

function GetFOSResources($arch) {
    if (stristr($arch, '64')) {
        $fos = "fos-streaming_unpack_x84_64.tar.gz";
    } else {
        $fos = "fos-streaming_unpack_i686.tar.gz";
    }
    shell_exec("wget http://downloads.sourceforge.net/project/iptv-md/upload/{$fos} -O /home/fos-streaming/{$fos} > /dev/null");
    shell_exec("tar -xzf /home/fos-streaming/{$fos} -C /home/fos-streaming/ > /dev/null");
}

function GetIP() {
    $ip_address = explode("\n", shell_exec("/sbin/ifconfig | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'"));

    foreach ($ip_address as $addr) {
        if (strncmp("127", $addr, 3) !== 0) {
            $result = $addr;
            break;
        }
    }
    return $result;
}

echo "3. [Installing needed files:]";
echo " [#";
$packages = [
    "libxml2-dev",
    "libbz2-dev",
    "libcurl4-openssl-dev",
    "libmcrypt-dev",
    "libmhash2",
    "libmhash-dev",
    "libpcre3",
    "nscd",
    "libpcre3-dev",
    "make",
    "build-essential",
    "libxslt1-dev git",
    "libssl-dev",
    "git",
    "php5",
    "unzip",
    "python-software-properties",
    "libpopt0",
    "libpq-dev",
    "libpq5",
    "libpspell-dev",
    "libpthread-stubs0-dev",
    "libpython-stdlib",
    "libqdbm-dev",
    "libqdbm14",
    "libquadmath0",
    "librecode-dev",
    "librecode0",
    "librtmp-dev",
    "librtmp0",
    "libsasl2-dev",
    "libsasl2-modules",
    "libsctp-dev",
    "libsctp1",
    "libsensors4",
    "libsensors4-dev",
    "libsm-dev",
    "libsm6",
    "libsnmp-base",
    "libsnmp-dev",
    "libsnmp-perl",
    "libsnmp30",
    "libsqlite3-dev",
    "libssh2-1",
    "libssh2-1-dev",
    "libssl-dev",
    "libstdc++-4.8-dev",
    "libstdc++6-4.7-dev",
    "libsybdb5",
    "libtasn1-3-dev",
    "libtasn1-6-dev",
    "libterm-readkey-perl",
    "libtidy-0.99-0",
    "libtidy-dev",
    "libtiff5",
    "libtiff5-dev",
    "libtiffxx5",
    "libtimedate-perl",
    "libtinfo-dev",
    "libtool",
    "libtsan0",
    "libunistring0",
    "libvpx-dev",
    "libvpx1",
    "libwrap0-dev",
    "libx11-6",
    "libx11-data",
    "libx11-dev",
    "libxau-dev",
    "libxau6",
    "libxcb1",
    "libxcb1-dev",
    "libxdmcp-dev",
    "libxdmcp6",
    "libxml2",
    "libxml2-dev",
    "libxmltok1",
    "libxmltok1-dev",
    "libxpm-dev",
    "libxpm4",
    "libxslt1-dev",
    "libxslt1.1",
    "libxt-dev",
    "libxt6",
    "linux-libc-dev",
    "m4",
    "make",
    "man-db",
    "netcat-openbsd",
    "odbcinst1debian2",
    "openssl",
    "patch",
    "pkg-config",
    "po-debconf",
    "python",
    "python-minimal",
    "python2.7",
    "python2.7-minimal",
    "re2c",
    "unixodbc",
    "unixodbc-dev",
    "uuid-dev",
    "x11-common",
    "x11proto-core-dev",
    "x11proto-input-dev",
    "x11proto-kb-dev",
    "xorg-sgml-doctools",
    "libjpeg8",
    "xtrans-dev",
    "zlib1g-dev"];
$pak_inst = 0;
foreach ($packages as $package) {
    $pack_status = shell_exec('dpkg-query -W -f=\'${Status}\\n\' ' . $package);
    $c = preg_match("/install ok installed/i", $pack_status);
    if ($c == 0) {
        shell_exec("apt-get install -y -f --force-yes $package > /dev/null");
    }
    $pak_inst++;
    if ($pak_inst == 8) {
        echo "#";
        $pak_inst = 0;
    }
}
echo "]PASS \n";


echo "4. [FOS-Panel Installation:] ";
echo " [#";

$srv_ip = GetIP();
GetFOSResources($arch);
echo "##";
GetFos();
echo "#";
AddSudo();
echo "#";
AddRCLocal();
echo "#";
BuildWeb();
echo "##";
echo "#";
shell_exec("chown fosstreaming:fosstreaming /home/fos-streaming/fos/nginx/html");
echo "#";
echo "]PASS \n";
echo "******************************************************************************************** \n";
echo "FOS-Streaming installed.. \n";
echo "visit management page: 'http://{$srv_ip}:8000' \n";
echo "Login: \n";
echo "Username: admin \n";
echo "Password: admin \n";
echo "IMPORTANT: After you logged in, go to settings and check your ip-address. \n";
echo "******************************************************************************************** \n";
