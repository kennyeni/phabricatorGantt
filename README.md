Phabricator Gantt Diagrams
==========================

This is a quick prototype that displays all Phabricator Tasks (Maniphest) as a Gantt Diagram. For this purpose some things have to be configured.

Configure Phabricator
---------------------

Gantt Diagrams need a start date and task duration, two fields Phabricator does not offer by default, however, it provides a very good and extensible framework; to add this fields edit: http://EXAMPLE.org/config/edit/maniphest.custom-field-definitions/ adding this JSON fields:

```json
{
  "estimated-days" : {
    "name"     : "Days Duration",
    "type"     : "int",
    "caption"  : "Estimated number of days this will take.",
    "required" : true
  },
  "start-day"      : {
    "name"     : "Start Date",
    "type"     : "date",
    "required" : true
  }
}
```

Then you will need to create a bot user to access tasks externally (http://EXAMPLE.org/people/create/)

Configure this project
----------------------

I used two external libraries, which you simple have to download and unzip in the same root folder this contents are.

* https://github.com/phacility/libphutil
* http://dhtmlx.com/docs/products/dhtmlxGantt/

Then you will need to edit "functions.php" file, adding Phabricator's domain, Bot username and conduit certificate.


Happy Planning!

Please tell me what you think!
contact[at] ekenny[dot]org
