<?php
    global $wpdb;
define("NEXT_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
    if(isset($_POST['btsubmit'])){
        //var_dump($_REQUEST);
        $wpdb->insert("wp_next_plugin_tbl", array(
            "name"  => $_POST['name'],
            "email" => $_POST['email']
        ));
        if($wpdb->insert_id > 0){
            $msg = '<div class="notice notice-success is-dismissible"><p>Success ao Gravar!</p></div>';
        }else{
            $msg = '<div class="notice notice-error is-dismissible"><p>SERVER ERRRROOUUU! </p></div>';
        }
    }
?>
<?=$msg;?>
<h2>Add User - Next Plugin</h2>
<hr>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>?page=wp-next-add">
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row"><label for="name">Nome</label></th>
            <td><input type="text" name="name" placeholder="Enter Nome" id="input_name" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="email">E-mail</label></th>
            <td><input type="email" name="email" placeholder="Enter E-Mail" id="input_name" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row">Description</th>
            <td>
                <p class="description">
                    It is a long established fact that a reader will be distracted by the readable
                    content of a page when looking at its layout. The point of using Lorem Ipsum is
                    that it has a more-or-less normal distribution of letters, as opposed to using
                    'Content here, content here', making it look like readable English.
                </p>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <button class="button button-primary" type="submit" name="btsubmit" >Submit</button>

</form>
