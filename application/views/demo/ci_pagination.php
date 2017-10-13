<!doctype html>
<html>
    <head>
        <title>Demo for CodeIgniter Pagination :: Demo cho việc phân trang trong CodeIgniter</title>
        <meta charset="utf-8" />
        <style>
            td{
                text-align: center;
            }
            td{
                border-top: 1px solid #ccc;
            }
            table{
                margin: 1em;
            }
        </style>
    </head>
    <body>
        <h1>Demo for CodeIgniter Pagination</h1>
        <?php
 
        // generate the table
        $this->table->set_heading('ID', 'ITEM CODE', 'QUANTITY');
        echo $this->table->generate($datatable);
 
        // generate the page navigation
 
        echo $this->pagination->create_links();
        ?>
    </body>
</html>