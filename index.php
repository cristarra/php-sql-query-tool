<?php
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $log=null;
    $sql=null;
    $results = array();

    if (!$conn) {
        $log = "Connection failed: " . mysqli_connect_error();
    }

    if(!empty($_POST["sql"])){
        $sql = $_POST["sql"];
        if(!empty($sql)){
            if(stripos($sql, 'drop') === false){
                $result_statement = mysqli_query($conn, $sql);
                if ($result_statement){
                    $results = mysqli_fetch_all_alt($result_statement,MYSQLI_ASSOC);
                    if(empty($results)){
                        $log = "Query: \"".$sql."\" executed successfully...";
                    }
                }else{
                    $log = "Error description: " . mysqli_error($conn);
                }
            }else{
                $log = "DROP are not allowed...";
            }
        }else{
            $log = "Please enter sql query first...";
        }
    }

    $sql_book = "SELECT * FROM db_book";
    $sql_customer = "SELECT * FROM db_customer";
    $sql_employee = "SELECT * FROM db_employee";
    $sql_order = "SELECT * FROM db_order";
    $sql_order_detail = "SELECT * FROM db_order_detail";
    $sql_shipper = "SELECT * FROM db_shipper";
    $sql_subject = "SELECT * FROM db_subject";
    $sql_supplier = "SELECT * FROM db_supplier";

    $result_book  = mysqli_query($conn, $sql_book);
    $result_customer  = mysqli_query($conn, $sql_customer);
    $result_employee  = mysqli_query($conn, $sql_employee);
    $result_order  = mysqli_query($conn, $sql_order);
    $result_order_detail  = mysqli_query($conn, $sql_order_detail);
    $result_shipper  = mysqli_query($conn, $sql_shipper);
    $result_subject  = mysqli_query($conn, $sql_subject);
    $result_supplier = mysqli_query($conn, $sql_supplier);

    function mysqli_fetch_all_alt($result,$type = NULL) {
        $select = array();

        while( $row = @mysqli_fetch_assoc($result) ) {
            $select[] = $row;
        }

        return $select;
    }

    $books = mysqli_fetch_all_alt($result_book,MYSQLI_ASSOC);
    $customers = mysqli_fetch_all_alt($result_customer,MYSQLI_ASSOC);
    $employees = mysqli_fetch_all_alt($result_employee,MYSQLI_ASSOC);
    $orders = mysqli_fetch_all_alt($result_order,MYSQLI_ASSOC);
    $order_details = mysqli_fetch_all_alt($result_order_detail,MYSQLI_ASSOC);
    $shippers = mysqli_fetch_all_alt($result_shipper,MYSQLI_ASSOC);
    $subjects = mysqli_fetch_all_alt($result_subject,MYSQLI_ASSOC);
    $suppliers = mysqli_fetch_all_alt($result_supplier,MYSQLI_ASSOC);

?>


<Pre>
    <b>db_book</b>
    <table style="width:100%; border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <?php foreach(array_keys($books[0]) as $key){ ?>
                <td style="border: 1px solid black;">
                    <?= $key ?>
                </td>
            <?php } ?>
        </tr>
        <?php foreach($books as $book) { ?>
            <tr style="border: 1px solid black;">
                <?php foreach(array_keys($books[0]) as $key) { ?>
                    <td style="border: 1px solid black;">
                        <?= $book[$key] ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <b>db_customer</b>
    <table style="width:100%; border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <?php foreach(array_keys($customers[0]) as $key){ ?>
                <td style="border: 1px solid black;">
                    <?= $key ?>
                </td>
            <?php } ?>
        </tr>
        <?php foreach($customers as $customer) { ?>
            <tr style="border: 1px solid black;">
                <?php foreach(array_keys($customers[0]) as $key) { ?>
                    <td style="border: 1px solid black;">
                        <?= $customer[$key] ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <b>db_employee</b>
    <table style="width:100%; border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <?php foreach(array_keys($employees[0]) as $key){ ?>
                <td style="border: 1px solid black;">
                    <?= $key ?>
                </td>
            <?php } ?>
        </tr>
        <?php foreach($employees as $employee) { ?>
            <tr style="border: 1px solid black;">
                <?php foreach(array_keys($employees[0]) as $key) { ?>
                    <td style="border: 1px solid black;">
                        <?= $employee[$key] ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <b>db_order</b>
    <table style="width:100%; border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <?php foreach(array_keys($orders[0]) as $key){ ?>
                <td style="border: 1px solid black;">
                    <?= $key ?>
                </td>
            <?php } ?>
        </tr>
        <?php foreach($orders as $order) { ?>
            <tr style="border: 1px solid black;">
                <?php foreach(array_keys($orders[0]) as $key) { ?>
                    <td style="border: 1px solid black;">
                        <?= $order[$key] ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <b>db_order_detail</b>
    <table style="width:100%; border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <?php foreach(array_keys($order_details[0]) as $key){ ?>
                <td style="border: 1px solid black;">
                    <?= $key ?>
                </td>
            <?php } ?>
        </tr>
        <?php foreach($order_details as $order_detail) { ?>
            <tr style="border: 1px solid black;">
                <?php foreach(array_keys($order_details[0]) as $key) { ?>
                    <td style="border: 1px solid black;">
                        <?= $order_detail[$key] ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <b>db_shipper</b>
    <table style="width:100%; border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <?php foreach(array_keys($shippers[0]) as $key){ ?>
                <td style="border: 1px solid black;">
                    <?= $key ?>
                </td>
            <?php } ?>
        </tr>
        <?php foreach($shippers as $shipper) { ?>
            <tr style="border: 1px solid black;">
                <?php foreach(array_keys($shippers[0]) as $key) { ?>
                    <td style="border: 1px solid black;">
                        <?= $shipper[$key] ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <b>db_subject</b>
    <table style="width:100%; border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <?php foreach(array_keys($subjects[0]) as $key){ ?>
                <td style="border: 1px solid black;">
                    <?= $key ?>
                </td>
            <?php } ?>
        </tr>
        <?php foreach($subjects as $subject) { ?>
            <tr style="border: 1px solid black;">
                <?php foreach(array_keys($subjects[0]) as $key) { ?>
                    <td style="border: 1px solid black;">
                        <?= $subject[$key] ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <b>db_supplier</b>
    <table style="width:100%; border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <?php foreach(array_keys($suppliers[0]) as $key){ ?>
                <td style="border: 1px solid black;">
                    <?= $key ?>
                </td>
            <?php } ?>
        </tr>
        <?php foreach($suppliers as $supplier) { ?>
            <tr style="border: 1px solid black;">
                <?php foreach(array_keys($suppliers[0]) as $key) { ?>
                    <td style="border: 1px solid black;">
                        <?= $supplier[$key] ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <form method="post">
        <textarea name="sql" placeholder="Enter sql query..." style="width: 60%; min-height: 200px;"><?= $sql ?></textarea>
        <input type="submit"/>
        <br/>
        <?= $log ?>
        <?php if(!empty($results)) { ?>
        <table style="width:100%; border: 1px solid black;">
            <tr style="border: 1px solid black;">
            <?php foreach(array_keys($results[0]) as $key){ ?>
                <td style="border: 1px solid black;">
                    <?= $key ?>
                </td>
            <?php } ?>
            </tr>
            <?php foreach($results as $result) { ?>
                <tr style="border: 1px solid black;">
                    <?php foreach(array_keys($results[0]) as $key) { ?>
                        <td style="border: 1px solid black;">
                            <?= $result[$key] ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </form>
</Pre>




