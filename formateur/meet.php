<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #meet{
            width:500px;
            height:500px;
        }
    </style>
</head>
<body>
  <div id="meet">

  </div>  

<script src='https://meet.jit.si/external_api.js'></script>
<script type="text/javascript">


const domain = 'meet.jit.si';
const options = {
    roomName: 'myJitsi',
    width: 700,
    height: 700,
    parentNode: document.querySelector('#meet')
};
const api = new JitsiMeetExternalAPI(domain, options);
</body>
</html>