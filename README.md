# IP Collector
Service that allows you to collect (public) IPs via a simple http GET.
Therefore this service stores IPs calling a Page in a MySQL DB.

Be aware that this service is algthough displaying what it had stored in the DB. So it's easy to access (But doesn't supply any privacy).

## Installation

* Throw it on a Apache with capable of doing some PHP.
* Setup a new MySQL DB for storing the IPs (Structure is in the ips.sql).
* Put the credentials for accessing the DB in the config.ini
