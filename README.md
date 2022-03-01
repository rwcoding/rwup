## 安装

+ 导入 `database/db.sql` 数据库
+ 配置 `.env` 数据库配置 和 APP环境变量

## 本地测试

```shell
php -S localhost:80 server.php

# 浏览器打开
http://localhost/index.html
```

## 构建同步生成工具

``` shell
cd build
php build.php 

# 根目录中生成文件: docg
```

## 配置同步生成工具

**根目录创建文件 `.docg`**

```ini
# 配置示例

# 文档系统分配的账号密码
username = admin
password = admin

# 工程标识
project = pms

# 根目录
root = docs 

# 文档系统接口地址
url = http://localhost:80
```

## 使用同步生成工具

```shell
# 在 docg 所在目录执行
# conf 为配置文件路径，默认从当前目录中查找 .docg 文件
php docg [--conf]

# 也可以自定义配置全局命令，例如windows系统下，创建文件 docg.bat (放入全局环境变量中)

@php "%~dp0docg" %*

```

