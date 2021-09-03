<?php
require('../../config.php');
$display = 3;
$q = "SELECT COUNT(id) FROM
registrations";
$r = @mysqli_query($conn, $q);
$row = @mysqli_fetch_array($r, MYSQLI_NUM);
$records = $row[0];
if ($records > $display) {
    $pages = ceil($records / $display);
} else {
    $pages = 1;
}
if (
    isset($_GET['s']) &&
    is_numeric($_GET['s'])
) {
    $start = $_GET['s'];
} else {
    $start = 0;
}
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';
echo "$sort";
switch ($sort) {
    case 'ln':
        $order_by = 'last_name ASC';
        break;
    case 'fn':
        $order_by = 'first_name ASC';
        break;
    case 'rd':
        $order_by =
            'registration_date ASC';
        break;
    default:
        $order_by =
            'registration_date ASC';
        $sort = 'rd';
        break;
}
$q = "SELECT *
FROM registrations
ORDER BY $order_by 
LIMIT $start, $display";
$r = mysqli_query($conn, $q);
if($r==TRUE){
    echo "successful";
}
else{
    echo mysqli_error($conn)  .$q;
}
echo '<table width="60%">
<thead>
<tr>
 <th align="left"><strong>Edit
 </strong></th>
 <th align="left">
 <strong>Delete</strong></th>
 <th align="left"><strong>
 <a href="dummy_pagination.php?sort=ln">Last Name</a></strong>
 </th>
 <th align="left"><strong>
 <a href="dummy_pagination.php?sort=fn">First Name</a></strong>
 </th>
 <th align="left"><strong>
 <a href="dummy_pagination.php?sort=rd">Date Registered</a>
 </strong></th>
</tr>
</thead>
<tbody>
';
$bg = '#eeeeee';
while ($row = mysqli_fetch_assoc($r)) {
    $bg = ($bg == '#eeeeee' ? '#ffffff'
        : '#eeeeee');
    echo '<tr bgcolor="' . $bg . '">
 <td align="left"><a href="edit.php?id=' . $row['id']
        . '">Edit</a></td>
 <td align="left">
 <a href="delete.php?id='
        . $row['id'] .
        '">Delete</a></td>
 <td align="left">' .
        $row['last_name'] . '</td>
 <td align="left">' .
        $row['first_name'] . '</td>
        <td align="left">' .
        $row['registration_date'] . '</td>
 
';
} // End of WHILE loop.
echo '</tbody></table>';
mysqli_close($conn);
if ($pages > 1) {
    echo '<br><p>';
    $current_page = ($start / $display)
        + 1;
    if ($current_page != 1) {
        echo '<a href="dummy_pagination.php?s=' . ($start - $display)
            . '&p=' . $pages . '&sort=' . $sort . '">Previous
    </a> ';
    }
    for ($i = 1; $i <= $pages; $i++) {
        if ($i != $current_page) {
            echo '<a href="dummy_pagination.php?s=' . (($display *
                ($i - 1))) . '&p=' . $pages
                . '&sort=' . $sort . '">' . $i . '</a> ';
        } else {
            echo $i . ' ';
        }
    } // End of FOR loop.
    if ($current_page != $pages) {
        echo '<a href="dummy_pagination.php?s=' . ($start +
            $display) . '&p=' . $pages . '&sort=' . $sort .
            '">Next</a>';   
    }
    echo '</p>';
}
// End of links section.
