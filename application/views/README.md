# Contacts Graph

A full organization contact tracking website, written in PHP and JS.

## Dependencies

Requires nothing other than PHP, MySQL and a webserver to operate.

## Setting Up

1. Clone this repository: `git clone xx` to the appropriate directory on your webserver.
2. Set up the database using the SQL file `graph.sql` located in the root of this repository.
3. Insert the root organization into the database table `graph_orgs`, using the following command
    * `INSERT INTO `dbname`.`graph_orgs` (name, parent) VALUES ('Your Org Name', NULL)`
4. Edit the configuration file `config.php` located in the `application/config` directory of this repository, changing the `$config['base_url'] = '';` variable to match your website.

5. Visit `http://your_site/` and the graph system is ready to go
