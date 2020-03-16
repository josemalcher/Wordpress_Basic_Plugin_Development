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







