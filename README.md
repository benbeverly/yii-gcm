yii-gcm
=======

Yii extension for Google Cloud Messaging. Still a very early work in progress.

I'm going to start by putting all the functionality into one file to get it working and sending messages. Then start enhancing it by shoving off into seperate classes.

Include this into respective config file:

'gcm' => array(
		'class' => 'application.components.yii-gcm.GCM',
		'apiKey' => '',
),

Sorry for slow progress. I'm working on this as a piece to a much larger "side" project.
It is currently capable of sending out the messages but none of the back-end and tracking communication is in there yet.