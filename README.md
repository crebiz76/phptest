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
