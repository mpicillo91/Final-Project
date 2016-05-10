#!/bin/sh

# mongo ds013232.mlab.com:13232/storenventoryfinalmongo -u manager -p password
mongo ds013232.mlab.com:13232/storenventoryfinalmongo -u manager -p password --eval 'db.SupplierMongo.find().forEach(printjson)'
# mongo ds013232.mlab.com:13232/storenventoryfinalmongo -u manager -p password --eval 'db.SupplierMongo.find().pretty()'
# mongo ds013232.mlab.com:13232/storenventoryfinalmongo -u manager -p password
# mongo < mongoscript.js
