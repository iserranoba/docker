# API definition

## GET /tickets
Returns the tickets list in the app

###Headers
|Headers||
|---|---|
|Accept|Accept Header: Used to indicate the content-type acceptable|
|required|application/json|

###Response
HTTP Status Code

200

|field|Description|
|---|---|
|tickets|array of ticket objects|
|tickets[x].date|date of the ticket|
|tickets[x].amount|amount of ticket|
|tickets[x].id|ticket identifier|

example

```
{
  "result": {
     "code": "200",
     "desc": "OK"
  },
  "data": {
     "tickets": [
       {
         "id": "01",
         "date": "2016xxxxx",
         "amount": "99.65"
       },
       {
         "id": "02",
         "date": "20160705XXXX",
         "amount": "15.45"
       },
       {
         "id": "03",
         "date": "20160712xxx",
         "amount": "145.12"
       }
     ]
  }
```

## GET /tickets/{ticketId}

Returns the details for a given ticket

###Headers
|Headers||
|---|---|
|Accept|Accept Header: Used to indicate the content-type acceptable|
|required|application/json|

|URI Parameters||
|---|---|
|ticketId|ticket identifier
|required (string)|example: 01|

###Response
HTTP Status Code

200

|field|Description|
|---|---|
|date|date of ticket|
|attendees|array of names of attendees|
|rest_name|name of restaurant|
|total|total amount paid|
|coord|coordinates of the restaurant|


example

```
"result": {
  "code": "200",
  "desc": "OK"
}
"data": {
  "ticket": {
    {
    "date": {"$date": "2016-06-15T22:22:12.000Z"},
    "attendees": [
      {"name": "Jorge Perez"},
      {"name": "Jean Cotino"},
      {"name": "Luis Sanchez"},
    ],
    "rest_name": "Era Coquela",
    "ticket_total": "153.00",
    "coord": "42.7021139,0.7993465"
    }
  }
}
```


