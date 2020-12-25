# PHP 프로그래밍
- 강의 소개: 
    - 강사: 김광섭(국민대 교수)
    - 교재: PHP_MySQL 웹 개발 마스터 북(남가람북스/2016)

## 1. PHP 개요 및 설치
- PHP: 동적 웹사이트 개발을 위한 웹 프로그래밍 언어
    - 목적: 회원가입, 로그인, 게시판, 예약 시스템, 쇼핑몰, 배송조회, 결제 등
    - 역사: 라스머스 레돌프(1995) ~
    - 특징: C언어 문법과 작동원리를 모방하여 C언어와 유사
    - PHP vs. ASP vs. JSP

- Server와 Client
    - APM: Apache + PHP + MySQL 
        - 동작 과정: Web browser <-> Apache <-> PHP <-> MySQL <-> DB
        - 환경 구축: 원격 웹 서버 이용 or 로컬 컴퓨터 이용
    - XAMPP 설치
        - /c/xampp/htdocs

- 프로그램 작성과 실행

## 2. PHP 기초
- apache 설정
    - httpd.conf(/c/xampp/apache/conf)
        - LISTEN 80
        - DocumentRoot "C:/xampp/htdocs"
        - DirectoryIndex
    - services(/c/Windows/System32/drivers/etc)

- php 설정
    - php.ini(/c/xampp/php)
        - default_charset="UTF-8"
        - date.timezone = Asia/Seoul
            
- EditPlus vs. NetBeans IDE

## 3. NetBeans 설치 및 사용법

## 4. 상수와 변수
- 상수(constant)
    - PHP_VERSION
    - PHP_OS
    - __LINE__
    - __FILE__
    - __DIR__
    - __FUNCTION__
    - __CLASS__
    - true/false/null

- 변수(variable)
    - 동적 변수 할당: php 코드가 실행되는 도중 값이 변함
    - 데이터 형식이 지정되지 않아도 됨
    - 반드시 $ 기호를 입력 후 사용

## 5. 연산자의 종류
- 연산자(operator)
    - 산술연산자(+, -, *, /, %, ++, --)
    - 연결연산자(.)
    - 대입연산자(=, +=, -=, *=, /=, %=, .=) or 할당연산자
    - 비교연산자(>, <, >=, <=, ==, !=)
    - 논리연산자(&&, ||)

## 6. 제어문 - IF 조건문/WHILE 반복문
- print vs. echo
    - print: 반환값을 가진다. 
    - echo: 반환값을 가지지 않는다. 

- 조건문
    - if ~ else
    - if ~ elseif ~ else
    - switch

- 반복문
    - while
    - for
    - do ~ while

- php web page
    - HTML과 php가 혼용된 형태
    - HTML 문서에 php 파일이 삽입된 형태로 php 파일로 생성하면됨. 

## 7. 제어문 - FOR 반복문
- 테이블의 구조
    - <table>
        - <th>: table header
        - <tr>: table row
        - <td>: table data

- while 반복문 -> for 반복문

- **GET 방식 vs POST 방식**

- 게시판 목록 보기

## 8. 제어문 - DO WHILE 반복문
- dowhile.php

## 9. 배열 - 1차원 배열, 2차원 배열
- array 함수

## 10. 내장함수와 사용자 정의 함수
- 함수의 정의: function keyword
    - 함수 호출 전에 함수의 정의가 되어야 한다. 

- 내장함수: 시스템에 존재하는 함수
    - 수학, 문자열, 파일, MySQL 데이터베이스 관련 내장 함수
        - abs(), sin(), cos(), tan(), date(), ceil(), floor(), round(), sqrt(), rand()
        - echo(), explode(), strlen(), str_replace(), substr(), nl2br(), sprintf()
        - copy(), mkdir(), chdir(), fopen(), fread(), fwrite()
        - mysql_connect(), mysql_create_db(), mysql_drop_db(), mysql_close()

- 외장함수: 사용자가 정의한 함수

- strlen(): Get string length
    ```php
    strlen(string $string):int
    ```
- substr(): Return part of a string
    ```php
    substr(string $string, int $start [,int $length]):int
    ```
- explode(): Split a string by a string
    ```php
    explode(string $delimiter, string $string [, int $limit = PHP_INT_MAX]):array
    ```
## 11. 쿠키와 세션(1)
- 쿠키: 서버에서 클라이언트에 텍스트 파일을 기록
    - setcookie() 함수
    - 예) 로그인 상태 유지

- register_globals = Off(default)
    - register_globals = On이면, 쿠키 사용

- setcookie() 함수
    - 형식
        ```php
        bool setcookie (string name [, string value [, int expire [, string path [, string domain [, bool secure]]]]])
        ```
    - 함수의 인자
        - name: 쿠키의 이름으로 대소문자 구분
        - value: 쿠키값으로 이 값을 사용자 컴퓨터에 저장
        - expire: 쿠키의 유효 시간(초 단위)
            - ex) time() + 60*60*24*30 -> 30일간 쿠키 값 유지
        - path: 쿠키를 사용할 수 있는 경로
        - domain: 쿠키를 이용할 수 있는 도메인을 의미
        - secure: 기본은 FALSE 값이고, TRUE로 설정하면 사이트 접속 시에만 쿠키가 설정
    - 기능: HTTP 헤더에 보낼 쿠키를 정의한다. 
    - 반환값: TRUE(성공)/FALSE(실패)
    - 설명
        - setcookie() 함수는 <html> or <head> 태그 이전에 사용한다. 
        - 만약 다른 태그를 먼저 사용하면 쿠키를 생성할 수 없다. 

- time() 함수
    - 형식
        ```php
        int time(void)
        ```
    - 기능: 현재 시간을 알림
    - 반환값: 현재 시간(성공 시)
    - 설명
        - 유닉스에서 사용하는 기준(1970-01-01 00:00:00 GMT)으로 설정
        - 현재 시각을 초 단위로 계산한 값을 정수형으로 변환

- 세션: 대표적으로 로그인과 관련된 부분
    - 예시) 로그인해야 볼 수 있는 페이지가 있는 사이트가 있다. 
    - 서버 단에 데이터 위치, 세션정보 그리고 데이터 가공 부분이 있다. 
    - 클라이언트도 세션 정보를 가지고 있다. 서로 대응되는 정보로 같지 않다. 
    - 서버 중심적

## 12.쿠키와 세션(2)
- super global variables(superglobals)
    - $GLOBALS
    - $_SERVER
    - $_REQUEST
    - $_POST
    - $_GET
    - $_FILES
    - $_ENV
    - $_COOKIE
    - $_SESSION

## 13. 데이터베이스 개념(MySQL 접속, DB 생성과 삭제)
- DB와 DBMS

- 관계형 데이터베이스(RDBMS)의 구조
    - 2차원 테이블에 데이터 저장
        - 테이블
        - 필드
        - 레코드

- MySQL의 특징
    - SQL(Structured Query Language)에 기반을 둔 관계형 DBMS 중 하나
    - Oracle, Informix, DB2 등 고가
    - MySQL(->MariaDB) 무료
    - 리눅스, 유닉스, 윈도우 등 거의 모든 운영체제 사용가능
    - 처리 속도가 빠르고 대용량 데이터 처리 용이
    - 보안성 우수

- MySQL 실행
    - C:\xamp\mysql\bin
        - mysql.exe
        - mysqladmin.exe
    - MySQL 접속
        - mysql -u root -p
        - password 없이 Enter

- MySQL 접속
    - mysql -u root -p
    - mysql -u root -p test
- 데이터베이스 확인
    - show databases;
- 종료
    - quit

- 새로운 데이터베이스 생성/삭제
    - create database phptest;
    - drop database phptest;
    - create database phptest
    -> charater set utf8 collate utf8_general_ci;

## 14. MySQL 각종 명령어1 - 사용자 추가, 테이블 생성 등
- 데이블 구조 출력
    - DESC {table};
        ```sql
        desc user;
        ```
- 데이블의 User, Password 데이터 출력
    - SELECT {Field,..} FROM {table};
        ```sql
        select User, Password from user;
        ```

- 사용자 등록
    - GRANT INSERT, SELECT, UPDATE, DELETE, CREATE, ALTER, DROP, ...
    on {DB}.{Table} to 'id@host' IDENTIFIED BY 'password';
    
        ```sql
        grant insert, select, update, delete, create, alter, drop
        on phptest.* to 'crebiz'@'localhost' identified by '123456';
        ```
- 테이블 생성
    - 데이터형
        - 숫자(tinyint, smallint)
        - 문자(char, varchar)
        - 시간/날짜
    - 예시
        ```sql
        create table member(
        -> id varchar(20) not null primary key,
        -> password varchar(20) not null,
        -> email varchar(25),
        -> tel varchar(25));
        ```
- 데이터 조작(추가)
    INSERT INTO {table}({field}, ...) VALUES({record},...)
    ```sql
        insert into member(id, password, email, tel)
        values('홍길동', 'hong', 'hong@example.com', '010-1234-5678');
    ```
- 데이터 검색
    SELECT {field},... FROM {table};
    ```sql
        select * from member;
        select password from member where id = '홍길동';
    ```
- 데이터 변경(업데이트)
    UPDATE {table} SET {field/update} = {value/update} WHERE {field/index} = {value/index};
    ```sql
        update member set id = 'leesunsin' where password = 'lee';
    ```
- 데이터 삭제
    DELETE FROM {table} WHERE {field} = {value};
    ```sql
        delete member where password = 'kang';

# 15. MySQL 명령어
- 데이터베이스 접속 명령
    - mysql -u계정 -p비밀번호 데이터베이스명
- 데이터베이스 생성 명령
    - create database 데이터베이스명

- 사용자 등록
    - create user '사용자명'@'호스트명' identified by '비밀번호'
- 사용자 삭제
    - drop user '사용자명'@'호스트명'
- 사용자 권한 부여
    - grant 권한 on 데이터베이스명.* to '사용자명'@'호스트명'
- 사용자 접근 권한 해제
    - revoke all on *.* from '사용자명'@'호스트명'

- 데이터베이스 생성
    - create database 데이터베이스명 [character set utf8]
- 데이터베이스 삭제
    - drop database 데이터베이스명
- 데이터베이스 사용
    - use 데이터베이스명

- 테이블 생성
    - create table 테이블명(
        필드명 데이터타입 [Null/Not Null],
        ...,
        primary key(필드명)
    )

    - 데이터형
        - 숫자(tinyint(1bytes), smallint(2B), mediumint(3B), int(4B), bigint(8B))
        - 문자(char(크기가 정해진 문자열), varchar(크기가 정해져 있지 않는 문자열))
        - 시간/날짜(date(날짜), datetime(8B, 1000-01-01 ~ 9999-12-31), timestamp(4B, 1970-01-01~))
- 테이블 삭제
    - drop table 테이블명
- 테이블 수정
    - alter table 테이블명 add 필드명 데이터타입

## 16. 회원관리1 - 가입폼과 가입처리 페이지 작성
- insertPro.php
    ```php
    <?php
        $id = $_REQUEST['id'];
        $passwd = $_REQUEST['passwd'];
        $name = $_REQUEST['name'];
        $tel = $_REQUEST['tel'];

        $db_user = "crebiz";
        $db_pass = "123456";
        $db_host = "localhost";
        $db_name = "phptest";
        $db_type = "mysql";
        $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8;";
        
        try{
            // 데이터베이스 연결
            $pdo = new PDO($dsn, $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            print "데이터베이스에 접속하였습니다. ";
        } catch (PDOException $Exception){
            die('오류: '.$Exception->getMessage());
        }
    ?>
    ```
## 17. 회원관리2 - DB 연동, List와 Delete 페이지 작성
- 회원가입 조회 페이지: list.php
    - insertPro.php 소스 코드 활용
    - MyDB.php 데이터베이스 연동
    - SQL문 작성
        - Select 문을 사용할 경우, beginTransaction()은 사용하지 않아도 됨
        - beginTransaction()는 데이터가 변경될 경우에만 사용
    - 수정 및 삭제
        - delete.php

## 18. 회원관리3 - Update 폼과 처리 페이지
- 회원 목록 출력: list.php
- 사용자 정보 수정: updateForm.php, updatePro.php

## 19. 과제 안내 
- MySQL 
- 퀴즈 출제
    - 번호  제목                                          출제일시                 삭제
    - 1     컴퓨터 범죄에 대한 대비책으로 옳지 않은 것은?   2017-06-20 07:33:22     삭제
    - 2     5세대 컴퓨터의 특징으로 볼 수 없는 것은?        2017-06-20 07:33:22     삭제
    - 2     멀티미디어의 특징으로 옳지 않은 것은?           2017-06-20 07:33:22     삭제

- 퀴즈 문제 출제 페이지
    - 퀴즈문제와 보기 및 정답은 퀴즈 출력 페이지(quiz.php)를 참조하시오. 
    - 문제 출제 페이지는 테이블로 작성하고 [출제하기]와 [다시작성]은 버튼으로 만드시오. 
    - [출제하기] 버튼을 클릭하면 insertPro.php 페이지를 호출한다. 
    - 출력형태(insertForm.php) 문제 및 보기와 정답 입력 예시

    - 문제 | [컴퓨터 범죄에 대한 대비책으로 옳지 않은 것은?]
    - 보기 |                  내용
    - 1    | [컴퓨터 바이러스 예방 및 치료에 대한 프로그램을 지속적으로 개발한다. ]
    - 2     | [크랙커(cracker)를 지속적으로 양성한다. ]
    - 3     | [인터넷을 통한 해킹으로부터 보호하기 위해 방화벽과 해킹 방지 시스템을 설치한다. ]
    - 4     | [정기적인 보안 검사를 통해 해킹 여부를 감시하도록 한다. ]
    - 정답  | [2]
    -                [출제하기][다시작성]

## 20. 회원관리4 - 관리자페이지 완성, 로그인 폼 DB 연결
- 관리자 페이지 완성
- 로그인 폼 DB 연결

## 21. 웹사이트 전체 구성과 회원가입 폼과 가입처리
- 실습 웹 사이트의 구성(메인화면)
    - 회원가입
    - 로그인/로그아웃, 회원정보 수정
    - 낙서장
    - 가입인사
    - (연주회)소개
    - 자료실
    - 자유게시판
    - (레슨)문의
    - 설문조사
- 초기 메인 화면 제작
    - 상단 헤더(top_login.php)
    - 메인 메뉴(top_menu.php)
    - 메인 화면(index.php)
