<?php

global $wpdb;

$all_students = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM wp_basicplugindevelopment.wp_next_plugin_tbl", ""), ARRAY_A
);
//echo "<pre>";
//print_r($all_students);
//
if (count($all_students) > 0) {
    ?>

    <h2>List User's - Next Plugin</h2>
    <hr>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
        <tr>
            <th scope="col" id="author" class="manage-column column-author">ID</th>
            <th scope="col" id="categories" class="manage-column column-categories">Nome</th>
            <th scope="col" id="tags" class="manage-column column-tags">E-MAIL</th>
        </tr>
        </thead>

        <tbody id="the-list">

        <?php
        foreach ($all_students as $index => $student) {
            ?>
            <tr id="<?= $student['id'] ?>"
                class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-Dummy category">
                <td class="author column-author" data-colname="Email">
                    <a href="javascript:void(0)"><?= $student['id'] ?></a>
                </td>
                <td class="categories column-categories" data-colname="Name">
                    <a href="javascript:void(0)"><?= $student['name'] ?></a>
                </td>
                <td class="categories column-categories" data-colname="Name">
                    <a href="javascript:void(0)"><?= $student['email'] ?></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th scope="col" id="author" class="manage-column column-author">ID</th>
            <th scope="col" id="categories" class="manage-column column-categories">Nome</th>
            <th scope="col" id="tags" class="manage-column column-tags">E-MAIL</th>
        </tr>
        </tfoot>
    </table>
    <?php
}
?>







