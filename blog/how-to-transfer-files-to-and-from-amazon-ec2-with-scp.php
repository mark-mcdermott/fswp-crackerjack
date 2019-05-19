<p>Transferring files through the terminal can be a real pain, compared to a drag and drop GUI like Filezilla.  But when you know the syntax, it gets a lot easier.  When you are uploading/downloading files to an amazon EC2 ubuntu box, you'll need the pemfile location on your computer.</p>
<h3>To upload from local computer to EC2</h3>
<p><code>scp -i &lt;localpath&gt;/pemfile.pem &lt;localpath&gt;/localfile.zip ubuntu@&lt;ipaddress&gt;:&lt;remotepath&gt;/destinationfile.zip</code></p>
<p>An example where the pemfile is locally stored in ~/pemfolder/, the local file to upload is myfile.zip and is on the desktop and the destination is the home folder of the EC2 instance and the public IP address of the EC2 instance is 216.3.128.12 would be:</p>
<p><code>scp -i ~/pemfolder/pemfile.pem ~/Desktop/myfile.zip ubuntu@216.3.128.12:~/myfile.zip</code></p>
<h3>To download from EC2 instance to local computer</h3>
<p><code>scp -i &lt;localpath&gt;/pemfile.pem ubuntu@&lt;ipaddress&gt;:&lt;remotepath&gt;/destinationfile.zip &lt;localpath&gt;/localfile.zip</code></p>
<p>An example where the pemfile is locally stored in ~/pemfolder/, the remote public ip address is 216.3.128.12, the file to download is myfile.zip and is in the home folder of the EC instance and the local for the file is on your desktop would be:</p>
<p><code>scp -i ~/pemfolder/pemfile.pem ubuntu@216.3.128.12:~/myfile.zip ~/Desktop/myfile.zip</code></p>