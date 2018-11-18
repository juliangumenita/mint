# Mint
Mint is a set of useful PHP codes for handling anything from database connections to code utilization.

## Getting Started
Mint uses one of the latest PHP version (7.2.4).


## Database Class
### Checking Connection
```
$database = new Database;
Database::connected();
```

### Creating A Secure Query
Returns a secure string for risky areas.
```
$database = new Database;
$injection = '" WHERE 1 = 1; "';
$safe = Database::secure($injection);
```

### Creating and Executing a Query
This method does nothing but executing the query straightforward, good for heavy usage.
```
$database = new Database;
$query = new Query("DELETE FROM users WHERE banned = true");

Database::execute($query);
```

### Checking If Query is Successfull
Returns true if the query successfully executed.
```
$database = new Database;
$query = new Query("INSERT INTO users(name) VALUES ('Name')");

Database::success($query);
```

### Counting
Returns the count(integer) of rows; if not successful, returns 0.
```
$database = new Database;
$query = new Query("SELECT id FROM users");

Database::count($query);
```

### Fetching
Fetches only one row(array) from query.
```
$database = new Database;
$query = new Query("SELECT * FROM users WHERE id = 1");

Database::fetch($query);
```

### Multiple Row Fetching
Fetches multiple rows from query and puts them into an array(arrays).
```
$database = new Database;
$query = new Query("SELECT * FROM users");

Database::multiple($query);
```
