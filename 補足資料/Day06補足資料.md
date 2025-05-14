Day6 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day6-3
```
## Web-1a に ssh
    sudo vim /var/www/html/index.php
---
<h2 class="text-center mt-3 mb-5">Simple Blog **1a**</h2>
--- 

## Web-1c に ssh    
sudo vim /var/www/html/index.php
---
<h2 class="text-center mt-3 mb-5">Simple Blog **1c**</h2>
---
```

# Day6-4
```
sudo systemctl stop httpd
sudo systemctl start httpd
```

# Day6-6
```
yes > /dev/null &
top # top コマンドは q を押すと停止できます
```