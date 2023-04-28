<h1>
    Danh sách sinh viên
</h1>
<a href="?action=create">
    Thêm sinh viên
</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach($result as $each) : ?>
         <tr>
            <td><?php echo $each['id'] ?></td>
            <td><?php echo $each['name'] ?></td>
            <td>
                <a href="?action=edit&id=<?php echo $each['id'] ?>">Edit</a>
                <a href="?action=delete&id=<?php echo $each['id'] ?>">Delete</a>
            </td>
         </tr>
    <?php endforeach ?>
</table>