<?php
//getting base url for actual path
$root=(isset($_SERVER["HTTPS"]) ? "https://" : "http://").$_SERVER["HTTP_HOST"];
$root.= str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);
$base_url = $root;

$install_path = $_SERVER['DOCUMENT_ROOT']; //
$install_path.= str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);
$root_path_project = str_replace("install/", "", $install_path);

$indexFile = $root_path_project."index.php";
$configFolder = $root_path_project."application/config";
$configFile = $root_path_project."application/config/config.php";
$dbFile = $root_path_project."application/config/database.php";
 
session_start();

?>
<div class="panel-group">
        <div class="panel panel-default">
        <p>&nbsp;</p>
        <div class="panel-body">
        <h3 class="ins_h3">Verify your purchase for 501 issue</h3>
        <?php
        if ($_POST) {

            $purchase_code = $_POST["purchase_code"];
            $username = $_POST["username"];
            $owner = $_POST["owner"];
            $is_501 = $_POST["is_501"];
            //need to change
            $source = 'CodeCanyon';
            //need to change
            $product_id = '23033741';

            $installation_url = (isset($_SERVER["HTTPS"]) ? "https://" : "http://").$_SERVER["SERVER_NAME"].substr($_SERVER["REQUEST_URI"], 0, -15);
 
            $curl_handle = curl_init();
            //need to change
            curl_setopt($curl_handle, CURLOPT_URL, str_rot13("uggcf://qbbefbsg.pb/qfy/Inyvqngvba/Inyvqngr/"));
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_POST, 1);
            curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
            $referer = "http://".$_SERVER["SERVER_NAME"].substr($_SERVER["REQUEST_URI"], 0, -24);
            $path = substr(realpath(dirname(__FILE__)), 0, -8);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
                'username' => $username,
                'purchase_code' => $purchase_code,
                'source' => $source,
                'product_id' => $product_id,
                'owner' => $owner,
                'is_501' => $is_501,
                'installation_url' => $installation_url,
                'ip' => $_SERVER['REMOTE_ADDR'],
                'referer' => $referer,
                'path' => $path
            ));

            $buffer = curl_exec($curl_handle);
            curl_close($curl_handle);
            if (! (is_object(json_decode($buffer)))) {
                $cfc = strip_tags($buffer);
            } else {
                $cfc = NULL;
            }

            $object = json_decode($buffer);
            

            if ($object->status == 'success') {
                if(file_exists(str_rot13('../nffrgf/oyhrvzc/ERFG_NCV.wfba'))){
                    unlink(str_rot13('../nffrgf/oyhrvzc/ERFG_NCV.wfba'));
                }
                require_once($install_path.'includes/core_class.php');
                $core = new Core();
                $core->create_rest_api();
                ?>
                    <h3 class="ins_7 ins_8"><i class='icon-ok'></i> Success!</h3>
            <div class="ins_10">Successfully fixed your 501 issue 
            </div>
             
            <div class="bottom">
                <div class="bottom ins_12">
                    <a href="<?php echo (isset($_SERVER["HTTPS"]) ? "https://" : "http://").$_SERVER["SERVER_NAME"].substr($_SERVER["REQUEST_URI"], 0, -15); ?>" class="btn btn-primary button_1">Go to Login Page</a>
                </div>
            </div>
                <?php
            } else {
                ?>
                <?php

                echo "<div class='alert alert-error'><i class='icon-remove'></i>". $object->message." ".($object->installation_status=="Installed"?" and your installation URL is different":'')."</div>";
                ?>
                <form action="<?php echo $base_url?>501.php" method="POST" class="form-horizontal">
                    <div class="control-group ins_2">
                        <label class="control-label" for="username">Username</label>
                        <div class="controls">
                            <input  id="username" type="text" name="username" class="input-large ins_4_ form-control" required="required" data-error="Username is required" placeholder="Username" />
                        </div>
                    </div>
                    <div class="control-group ins_2">
                        <label class="control-label" for="purchase_code">Purchase Code</label>
                        <div class="controls">
                            <input id="purchase_code" type="text" name="purchase_code" class="input-large ins_4_ form-control" required="required" data-error="Purchase Code is required" placeholder="Purchase Code" />
                        </div>
                        <!-- modified -->
                        <input id="owner" type="hidden" name="owner" class="input-large" value="doorsoftco"  />
                        <input id="is_501" type="hidden" name="is_501" class="input-large" value="yes"  />
                    </div>
                    <div class="bottom ins_5">
                        <input type="submit" class="btn btn-primary button_1"  value="Verify"/>
                    </div>
                </form>
                <?php
            }
        } else {
            ?>
            <p class="ins_6">Please provide your purchase information </p>
            <form action="<?php echo $base_url?>501.php" method="POST" class="form-horizontal">
                <div class="control-group ins_14">
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                        <input id="username" type="text" name="username" class="input-large ins_4 form-control" required="required" data-error="Username is required" placeholder="Username" />
                    </div>
                </div>
                <div class="control-group ins_14">
                    <label class="control-label" for="purchase_code">Purchase Code</label>
                    <div class="controls">
                        <input id="purchase_code" required="required" type="text" name="purchase_code" class="input-large ins_4 form-control"  data-error="Purchase Code is required" placeholder="Purchase Code" />
                    </div>
                    <!-- modified -->
                    <input id="owner" type="hidden" name="owner" class="input-large" value="doorsoftco"  />
                    <input id="is_501" type="hidden" name="is_501" class="input-large" value="yes"  />
                </div>

                <div class="bottom ins_5">
                    <input type="submit" class="btn btn-primary button_1"  value="Verify"/>
                </div>
            </form>

            </div>
            </div>
            </div>
            <?php
        }?>