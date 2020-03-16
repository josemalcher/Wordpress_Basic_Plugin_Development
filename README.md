# Wordpress Basic Plugin Development

- https://www.youtube.com/playlist?list=PLT9miexWCpPXsGTI9wL6Wsw51FoqLJImK

- Menus, Submenus, Data save, Data list
- Edit details & Delete row data

## Menus, Submenus, Data save, Data list

## Edit details & Delete row data

- wp-content/plugins/wp-next-plugin/wp-next-plugin.php

```php
<?php
/*
  Plugin Name: WP Next Plugin
  Description: Simple Plugin shows the direct form submission
  Version: 1.0.0
  Author: José Malcher Jr.
 */

define("NEXT_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

function next_menus_development()
{
    add_menu_page(
        "Next Plugin",
        "Next Plugin",
        "manage_options",
        "wp-next-plugin",
        "next_wp_list_call");
    add_submenu_page(
        "wp-next-plugin",
        "List Students",
        "List Students",
        "manage_options",
        "wp-next-plugin",
        "next_wp_list_call");
    add_submenu_page(
        "wp-next-plugin",
        "Addd Student",
        "Add Student",
        "manage_options",
        "wp-next-add",
        "next_wp_add_call");
}

add_action("admin_menu", "next_menus_development");
function next_wp_list_call()
{
    include_once NEXT_PLUGIN_DIR_PATH . '/view/list-student.php';
}

function next_wp_add_call()
{
    include_once NEXT_PLUGIN_DIR_PATH . '/view/add-student.php';
}
```

- wp-content/plugins/wp-next-plugin/view/add-student.php 

```php
<?php
global $wpdb;
$msg = "";
define("NEXT_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

$action = isset($_GET['action']) ? trim($_GET['action']) : "";
$id     = isset($_GET['id'])     ? intval($_GET['id']) : "";

$row_details = $wpdb->get_row(
        $wpdb->prepare("SELECT * from wp_next_plugin_tbl WHERE id = %d", $id), ARRAY_A
);

//print_r($row_details);
if (isset($_POST['btsubmit'])) {
    //var_dump($_REQUEST);

    $action = isset($_GET['action']) ? trim($_GET['action']) : "";
    $id     = isset($_GET['id'])     ? intval($_GET['id'])   : "";

    if(!empty($action)){
        $wpdb->update("wp_next_plugin_tbl", array(
            "name" => $_POST['name'],
            "email" => $_POST['email']
        ), array(
            "id" => $id
        ));
        $msg = '<div class="notice notice-success is-dismissible"><p>Update Com Sucesso!</p></div>';
    }else{
        $wpdb->insert("wp_next_plugin_tbl", array(
            "name" => $_POST['name'],
            "email" => $_POST['email']
        ));
        if ($wpdb->insert_id > 0) {
            $msg = '<div class="notice notice-success is-dismissible"><p>Success ao Gravar!</p></div>';
        } else {
            $msg = '<div class="notice notice-error is-dismissible"><p>SERVER ERRRROOUUU! </p></div>';
        }
    }


}
?>
<?= $msg; ?>
<h2>Add User - Next Plugin</h2>
<hr>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?page=wp-next-add<?php if(!empty($action)){echo '&action=edit&id='.$id;} ?>">
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row"><label for="name">Nome</label></th>
            <td><input value="<?=isset($row_details['name']) ? $row_details['name'] : "" ?>" type="text" name="name" placeholder="Enter Nome" id="input_name" class="regular-text"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="email">E-mail</label></th>
            <td><input value="<?=isset($row_details['email']) ? $row_details['email'] : "" ?>" type="email" name="email" placeholder="Enter E-Mail" id="input_name" class="regular-text"/></td>
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
    <button class="button button-primary" type="submit" name="btsubmit">Submit</button>

</form>

```

- wp-content/plugins/wp-next-plugin/view/list-student.php

```php
<?php
global $wpdb;
$all_students = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT * from wp_next_plugin_tbl", ""
    ), ARRAY_A
);

$action = isset($_GET['action']) ? trim($_GET['action']) : "";
$id     = isset($_GET['id']) ? intval($_GET['id']) : "";
if (!empty($action) && $action == "delete") {

    $row_exists = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * from wp_next_plugin_tbl WHERE id = %d", $id
        )
    );

    if ($row_exists > 0) {
        $wpdb->delete("wp_next_plugin_tbl", array(
            "id" => $id
        ));
    }
    ?>
    <script>
        location.href = "<?=site_url();?>/wp-admin/admin.php?page=wp-next-plugin";
    </script>
    <?php
}
if (count($all_students) > 0) {
    ?>

    <h2>List User's - Next Plugin</h2>
    <hr>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
        <tr>
            <th scope="col" id="id"      class="manage-column column-id">ID</th>
            <th scope="col" id="name"    class="manage-column column-name">Nome</th>
            <th scope="col" id="email"   class="manage-column column-email">E-mail</th>
            <th scope="col" id="actions" class="manage-column column-actions">Actions</th>
        </tr>
        </thead>

        <tbody id="the-list">

        <?php
        foreach ($all_students as $index => $student) {
            ?>
            <tr id="<?= $student['id'] ?>"
                class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-Dummy category">
                <td class="author column-id" data-colname="Email">
                    <a href="javascript:void(0)"><?=$student['id'] ?></a>
                </td>
                <td class="categories column-name" data-colname="Name">
                    <a href="javascript:void(0)"><?=$student['name'] ?></a>
                </td>
                <td class="categories column-email" data-colname="Email">
                    <a href="javascript:void(0)"><?=$student['email'] ?></a>
                </td>
                <td class="categories column-actions" data-colname="Actions">
                    <a href="admin.php?page=wp-next-add&action=edit&id=<?php echo $student['id']; ?>">Edit</a> | <a href="admin.php?page=wp-next-plugin&id=<?php echo $student['id']; ?>&action=delete" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th scope="col" id="id"      class="manage-column column-id">ID</th>
            <th scope="col" id="name"    class="manage-column column-name">Nome</th>
            <th scope="col" id="email"   class="manage-column column-email">E-mail</th>
            <th scope="col" id="actions" class="manage-column column-actions">Actions</th>
        </tr>
        </tfoot>
    </table>
    <?php
}
?>

```



