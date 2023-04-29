<h1>
    list student
</h1>
<h2>

    <a href="?action=create&controller=student"> Add Info</a>
</h2>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>IdClass</th>
        <th>action</th>
    </tr>
    <?php foreach ($result as $each) : ?>
        <tr>
            <td><?php echo $each['id'] ?></td>
            <td><?php echo $each['name'] ?></td>
            <td><?php echo $each['class_name'] ?></td>
            <td>
                <a href="?action=edit&controller=student&id=<?php echo $each['id'] ?> ">Edit</a>
                <a href="?action=delete&controller=student&id=<?php echo $each['id'] ?> ">Delete</a>
            </td>
        </tr>

    <?php endforeach ?>


</table>