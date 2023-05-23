# jb-lnkconnectablecitoconnectableci

Copyright (c) 2019-2021 Jeffrey Bostoen

[![License](https://img.shields.io/github/license/jbostoen/iTop-custom-extensions)](https://github.com/jbostoen/iTop-custom-extensions/blob/master/license.md)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/jbostoen)
🍻 ☕

Need assistance with iTop or one of its extensions?  
Need custom development?  
Please get in touch to discuss the terms: **info@jeffreybostoen.be** / https://jeffreybostoen.be

## What?

This class is very similar to the lnkConnectableCIToNetworkDevice.
However, with this implementation, ConnectableCI should be linkable to other ConnectableCIs.
(ConnectableCI = parent of DatacenterDevices such as NAS, NetworkDevice, Server, SANSwitch, StorageSystem, TypeLibrary...)

Additional info can be added, such as:

* **comment**
* **link type** (USB 3.0, RJ45, optical fibre single or multi mode, ...)
* **patch label**


⚠ This alters default iTop classes.
In the "Network devices" tab of a Connectable CI, it replaces Link Connectable CI / Network Device.
In the "Devices" tab of a Network Device, it replaces Link Connectable CI / Network Device.
It doesn't remove this old class though!

With some work (for example CSV export/import), you can copy most of your old data from the lnkConnectableCIToNetworkDevice to lnkConnectableCIToConnectableCI.


## Cookbook

XML:
* add a new class

## Upgrade notes

If you used the jb-ipdevices class before, you can run this query on your database:
```
use itop;
UPDATE lnkconnectablecitoconnectableci 
SET device1_id = connectableci_id, device1_port = device_port, device2_Id = networkdevice_id, device2_port = network_port
```
