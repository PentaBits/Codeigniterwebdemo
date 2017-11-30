<script>

 $('#imgdata').DataTable({
    "ordering": true,
    "order": [], //Initial no order.
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    },
    'aoColumnDefs': [
            {'aTargets': [1],'bSortable': false},
            {'aTargets': [-1],'bSortable': false}
             /* 1st one, start by the right */
    ]
    });


</script>



<table class="table table-bordered table-hover" id="imgdata">
    <thead>
        <tr>
            <th>File</th>
            <th>Image</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($datas) {
            foreach ($datas as $content) {
                ?>
                <tr>
                    <td>
                        <?php echo($content["realfilename"]); ?>
                    </td>
                    <td>
                                               
                        <a data-fancybox="gallery" href="<?php echo(base_url() . "application/assets/images/multiimages/" . $content["filename"]); ?>">
                            <img src="<?php echo(base_url() . "application/assets/images/multiimages/thumbnail/" . $content["thumbnail"]); ?>"></a>
                        
                    </td>
                    <td><?php echo($content["uploaddate"]); ?></td>
                    <td>
                        <button type="button" id="<?php echo($content["id"]); ?>" class="btn btn-danger btn-md rmv-file" data-toggle="modal" data-target="#removeconfmodal">Remove</button>
                    </td>

                </tr>
                <?php
            }
        }
        ?>

    </tbody>
</table>