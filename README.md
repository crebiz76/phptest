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