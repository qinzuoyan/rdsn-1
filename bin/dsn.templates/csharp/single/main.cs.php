<?php
require_once($argv[1]); // type.php
require_once($argv[2]); // program.php
$file_prefix = $argv[3];
$idl_type = $argv[4];
?>
using System;
using System.IO;
using dsn.dev.csharp;

namespace <?=$_PROG->get_csharp_namespace()?> 
{
    class Program
    {
        static void Main(string[] args)
        {
            <?=$_PROG->name?>Helper.InitCodes();

            ServiceApp.RegisterApp<<?=$_PROG->name?>ServerApp>("server");
            ServiceApp.RegisterApp<<?=$_PROG->name?>ClientApp>("client");        
<?php foreach ($_PROG->services as $svc) { ?>
            // ServiceApp.RegisterApp<<?=$svc->name?>PerfTestClientApp>("client.<?=$svc->name?>.perf.test");
<?php } ?>

            Native.dsn_run(args.Length, args, true);
        }
    }
}
