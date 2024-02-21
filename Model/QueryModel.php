<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class QueryModel extends Database
{
    public function query1()
    {
        return $this->query('SELECT Concat(contactfirstname," ",contactlastname) FullName from customers;');
    }

    public function query2()
    {
        return $this->query('SELECT Country, Count(*) Total_Customers
        from customers
        group by country
        order by Total_Customers desc
        limit 1');
    }

    public function query3()
    {
        return $this->query('SELECT City, count(*) Total_Customers
        from customers 
        group by city
        order by Total_Customers desc
        limit 2');
    }

    public function query4()
    {
        return $this->query('SELECT State, Count(*) Total_Customers
        from customers
        where state is not null
        group by State
        order by Total_Customers desc
        limit 1');
    }

    public function query5()
    {
        return $this->query('SELECT Customernumber,customername,city,country
        from customers
        where state is null');
    }

    public function query6()
    {
        return $this->query('SELECT customernumber,customername 
        from customers 
        where creditlimit>100000');
    }

    public function query7()
    {
        return $this->query('SELECT customernumber,customername
        from customers
        where creditlimit between 50000 and 200000');
    }

    public function query8()
    {
        return $this->query('SELECT customernumber,customername,creditlimit
        from customers
        where creditlimit=(select max(creditlimit) from customers)');
    }

    public function query9()
    {
        return $this->query('SELECT customernumber,customername,creditlimit
        from customers
        having creditlimit=(select min(creditlimit) from customers)');
    }

    public function query10()
    {
        return $this->query('SELECT employeenumber,concat(firstname," ",lastname) FullName,count(*) Total_customers
        from customers c join employees e 
        on c.salesrepemployeenumber = e.employeenumber
        where salesrepemployeenumber is not null
        group by 1
        order by Total_customers desc');
    }

    public function query11()
    {
        return $this->query('SELECT customernumber,customername,concat(firstname," ",lastname) Employee_Name
        from customers c join employees e 
        on c.salesrepemployeenumber = e.employeenumber
        where salesrepemployeenumber is not null');
    }

    public function query12()
    {
        return $this->query('SELECT customernumber,customername,country,city
        from customers
        where salesRepEmployeeNumber is null');
    }

    public function query13()
    {
        return $this->query('SELECT customername,concat(contactfirstname," ",contactlastname) ContactName 
        from customers 
        where contactfirstname in ("arnold","sarah")');
    }

    public function query14()
    {
        return $this->query('SELECT Reportsto,count(*) Employees
        from employees
        where reportsto is not null
        group by reportsto
        order by Employees desc');
    }

    public function query15()
    {
        return $this->query('SELECT customername,datediff(shippeddate,orderdate) Total_Days
        from customers c join orders o
        on c.customernumber=o.customernumber
        where shippeddate is not null');
    }

    public function query16()
    {
        return $this->query('SELECT employeenumber,concat(firstname," ",lastname) EmployeeName,jobtitle 
        from employees
        where jobtitle like "%VP%" or jobtitle like "%Manager%"');
    }

    public function query17()
    {
        return $this->query('SELECT year(shippeddate) Year,count(shippeddate) Total_shipped
        from orders
        where shippeddate is not null
        group by year(shippeddate)');
    }

    public function query18()
    {
        return $this->query('SELECT customernumber,count(*) Total_Orders
        from orders
        group by customernumber
        order by count(*) desc');
    }

    public function query19()
    {
        return $this->query('SELECT productvendor,count(distinct p.productcode) Total_Products,sum(quantityordered) Total_quantity,
        sum(quantityordered*priceeach) Total_price from products p 
        inner join orderdetails od on p.productcode=od.productcode
        group by productvendor
        order by Total_Products desc');
    }

    public function query20()
    {
        return $this->query('SELECT p.productcode,productname,sum(quantityordered) Total_quantity from products p 
        inner join orderdetails od on p.productcode=od.productcode
        group by p.productcode,productname
        order by Total_quantity desc');
    }

    public function query21()
    {
        return $this->query('SELECT p.productName,concat(c.contactFirstName," ",c.contactLastName) as c_name from customers c 
        inner join orders o on c.customernumber=o.customernumber
        inner join orderdetails od on o.ordernumber=od.ordernumber
        inner join products p on od.productcode=p.productcode
        where Contactfirstname like "Thomas%"');
    }

    public function query22()
    {
        return $this->query('SELECT customername,concat(Contactfirstname," ",contactlastname) as Contact_Name,count(*) as Total_Products 
        from customers c 
        inner join orders o on c.customernumber=o.customernumber
        inner join orderdetails od on o.ordernumber=od.ordernumber
        inner join products p on od.productcode=p.productcode
        group by customername,Contact_Name
        order by Total_Products desc 
        limit 1');
    }

    public function query23()
    {
        return $this->query('SELECT p.Productcode,productname,count(*) Total_customers from  customers c 
        inner join orders o on c.customernumber=o.customernumber
        inner join orderdetails od on o.ordernumber=od.ordernumber
        inner join products p on p.productcode=od.productcode
        group by p.Productcode,productname
        order by Total_customers desc
        limit 1');
    }

    public function query24()
    {
        return $this->query('SELECT c.customernumber,customername,amount  from customers c 
        inner join payments p on c.customernumber=p.customernumber
        inner join orders o on c.customernumber=o.customernumber
        inner join orderdetails od on o.ordernumber=od.ordernumber
        inner join products pr on pr.productcode=od.productcode
        where amount>(select avg(amount) from payments)
        group by c.customernumber,customername,amount');
    }

    public function query25()
    {
        return $this->query('SELECT status,o.customernumber,customername,od.ordernumber,count(productcode) Total_products,
        sum(quantityordered*priceeach) Total_Price from orders o 
        inner join payments p  on o.customernumber=p.customernumber
        inner join orderdetails od on o.ordernumber=od.ordernumber
        inner join customers c on p.customernumber=c.customernumber
        where status ="On Hold"
        group by status,o.customernumber,customername,od.ordernumber');
    }

    public function query26()
    {
        return $this->query("SELECT customerNumber,concat(contactFirstName,contactLastName) as Full_Name, creditlimit,
        case 
            when creditLimit < 10000 then 'Low Credit Limit'
            when  creditLimit > 10000 and creditLimit < 75000 then 'Medium Credit Limit'
            when  creditLimit > 75000 then 'High Credit Limit'
            end as Customer_Credit_Status
        from customers");
    }

    public function query27()
    {
        return $this->query("SELECT customerNumber,concat(contactFirstName,contactLastName) as Full_Name, creditlimit,
        case 
            when creditLimit < 10000 then 'Low Credit Limit'
            when  creditLimit > 10000 and creditLimit < 75000 then 'Medium Credit Limit'
            when  creditLimit > 75000 then 'High Credit Limit'
            end as Customer_Credit_Status
        from customers
        where creditLimit < 10000");
    }
}
