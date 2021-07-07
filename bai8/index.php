<?php require 'dbconnect.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style type="text/css">
            table{
                width: 800px;
                margin: auto;
                text-align: center;
            }
            tr {
                border: 1px solid;
            }
            th {
                border: 1px solid;
            }
            td {
                border: 1px solid;
            }
            h1{
                text-align: center;
                color: red;
            }
            #button{
                margin: 2px;
                margin-right: 10px;
                float: right;
            }
            .form {
                text-align: center;
            }


        </style>
    </head>
    <body>
    <div class="form">
        <form action="search.php" method="get">
            Search: <input type="text" name="search" />
            <input type="submit" name="ok" value="search" />
        </form>
    </div>
        <table id="datatable" style="border: 1px solid">
            <h1>Quản lý cầu thủ</h1>
            <thead>
            <?php
            $a = new database();
            $data = $a->get_all_players();
            foreach ($data as $value) { ?>
                <tr role="row">
                    <td><?=$value['id']?></td>
                    <td><?=$value['name']?></td>
                    <td><?=$value['age']?></td>
                    <td><?=$value['national']?></td>
                    <td><?=$value['position']?></td>
                    <td><?=$value['salary']?>$</td>
                    <td><a href="edit.php?id=<?=$value['id']?>">Edit</a></td>
                    <td><a href="delete.php?id=<?=$value['id']?>"> Delete</a></td>
                </tr>
            <?php } ?>
            </thead>

            <tfoot>
                <tr>
                    <td colspan="8">
                        <a href="add.php"><button id="button">Thêm cầu thủ</button></a>
                    </td>
                </tr>
            </tfoot>
        </table>