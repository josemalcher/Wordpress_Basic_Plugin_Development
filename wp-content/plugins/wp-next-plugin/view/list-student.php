<?php

global $wpdb;

$all_students = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM wp_next_plugin_tbl", ""), ARRAY_A
);
//echo "<pre>";
//print_r($all_students);

if (count($all_students) > 0) {
    ?>

    <h2>List User's - Next Plugin</h2>
    <hr>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
        <tr>
            <td id="cb" class="manage-column column-cb check-column">
                <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                <input id="cb-select-all-1" type="checkbox">
            </td>
            <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                <span>Title</span>
            </th>
            <th scope="col" id="author" class="manage-column column-author">Author</th>
            <th scope="col" id="categories" class="manage-column column-categories">Categories</th>
            <th scope="col" id="tags" class="manage-column column-tags">Tags</th>
            <th scope="col" id="comments" class="manage-column column-comments num sortable desc">
										<span>
											<span class="vers comment-grey-bubble" title="Comments">
												<span class="screen-reader-text">Comments</span>
											</span>
										</span>
            </th>
            <th scope="col" id="date" class="manage-column column-date sortable asc">
                <a href="javascript:void(0)">
                    <span>Date</span><span class="sorting-indicator"></span>
                </a>
            </th>
        </tr>
        </thead>

        <tbody id="the-list">

        <?php
        foreach ($all_students as $index => $student) {
            ?>
            <tr id="post-1"
                class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-Dummy category">
                <th scope="row" class="check-column">
                    <label class="screen-reader-text" for="cb-select-1">Select Post #1</label>
                    <input id="cb-select-1" type="checkbox" name="post[]" value="1">
                    <div class="locked-indicator">
                        <span class="locked-indicator-icon" aria-hidden="true"></span>
                        <span class="screen-reader-text">“Post #1” is locked</span>
                    </div>
                </th>
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                    <div class="locked-info">
                        <span class="locked-avatar"></span>
                        <span class="locked-text"></span>
                    </div>
                    <strong>
                        <a class="row-title" href="javascript:void(0)" aria-label="“Post #1” (Edit)">Post #1</a>
                    </strong>

                    <div class="row-actions">
                        <span class="edit"><a href="javascript:void(0)" aria-label="Edit “Post #1”">Edit</a> | </span>
                        <span class="inline hide-if-no-js"><button type="button" class="button-link editinline"
                                                                   aria-label="Quick edit “Post #1” inline"
                                                                   aria-expanded="false">Quick Edit</button> | </span>
                        <span class="trash"><a href="javascript:void(0)" class="submitdelete"
                                               aria-label="Move “Post #1” to the Trash">Trash</a> | </span>
                        <span class="view"><a href="javascript:void(0)" rel="bookmark"
                                              aria-label="View “Post #1”">View</a></span>
                    </div>
                    <button type="button" class="toggle-row"><span class="screen-reader-text">Show more details</span>
                    </button>
                </td>
                <td class="author column-author" data-colname="Author">
                    <a href="javascript:void(0)">dummy@emailaddress</a>
                </td>
                <td class="categories column-categories" data-colname="Categories">
                    <a href="javascript:void(0)">Dummy category</a>
                </td>
                <td class="tags column-tags" data-colname="Tags">
                    <span aria-hidden="true">—</span>
                    <span class="screen-reader-text">No tags</span>
                </td>
                <td class="comments column-comments" data-colname="Comments">
                    <div class="post-com-count-wrapper">
                        <a href="javascript:void(0)" class="post-com-count post-com-count-approved">
                            <span class="comment-count-approved" aria-hidden="true">1</span>
                            <span class="screen-reader-text">1 comment</span>
                        </a>
                        <span class="post-com-count post-com-count-pending post-com-count-no-pending">
											<span class="comment-count comment-count-no-pending"
                                                  aria-hidden="true">0</span>
											<span class="screen-reader-text">No pending comments</span></span>
                    </div>
                </td>
                <td class="date column-date" data-colname="Date">Published<br>
                    <abbr title="2019/08/22 9:00:46 am">2 hours ago</abbr>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <td class="manage-column column-cb check-column">
                <label class="screen-reader-text" for="cb-select-all-2">Select All</label>
                <input id="cb-select-all-2" type="checkbox">
            </td>
            <th scope="col" class="manage-column column-title column-primary sortable desc">
                <span>Title</span>
            </th>
            <th scope="col" class="manage-column column-author">Author</th>
            <th scope="col" class="manage-column column-categories">Categories</th>
            <th scope="col" class="manage-column column-tags">Tags</th>
            <th scope="col" class="manage-column column-comments num sortable desc">
										<span>
											<span class="vers comment-grey-bubble" title="Comments">
												<span class="screen-reader-text">Comments</span>
											</span>
										</span>
            </th>
            <th scope="col" class="manage-column column-date sortable asc">
                <a href="javascript:void(0)">
                    <span>Date</span>
                    <span class="sorting-indicator"></span>
                </a>
            </th>
        </tr>
        </tfoot>
    </table>
    <?php
}
?>







