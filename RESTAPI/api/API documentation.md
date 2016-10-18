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
         "date": ""2016-07-07T16:30:51.000Z"",
         "amount": "96.64"
       },
       {
         "id": "02",
         "date": "2016-07-03T16:31:51.000Z",
         "amount": "34.12"
       },
       {
         "id": "03",
         "date": "2016-06-023T13:12:45.000Z",
         "amount": "55.32"
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
{
"result": {
  "code": "200",
  "desc": "OK"
 },
"data": {
  "ticket": {
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
## POST /tickets

Create a new ticket

###Headers
|Headers||
|---|---|
|Content-type|MIME type of the body of the request|
|required (string)|example application/json|
|Accept|Accept Header: Used to indicate the content-type acceptable|
|required|exampleapplication/json|

###Request

|field|Description|
|---|---|
|date|date of ticket|
|attendees|array of names of attendees|
|rest_name|name of restaurant|
|total|total amount paid|
|coord|coordinates of the restaurant|

example
```
{
  "ticket": {
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
```
###Response
####HTTP Status Code
201

|field|Description|
|---|---|
|ticket_id|identifier for the new ticket|
|date|date of ticket|
|ticket_total|total amount paid|

####BODY

example

```
{
"result": {
  "code": "201",
  "desc": "Ticket created"
}
"data": {
  "ticket_id": "09",
  "date": {"$date": "2016-06-15T22:22:12.000Z"},
  "ticket_total": "153.00",
  }
}
```
400

Bad Request

**PENDING List of codes**

example
```
{
  "result": {
    "code": 400,
    "info": "Bad request"
  },
  "errors": [
    {
      "code": "requestBodyInvalid",
      "description": "request body is invalid"
    }
  ]
} 
