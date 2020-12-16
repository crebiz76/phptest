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