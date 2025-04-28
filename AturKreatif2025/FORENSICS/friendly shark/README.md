# friendly shark
by chaengzy

## Description
I forgot my username and password, but I captured a pcap file before this. Can you help me retrieve them?
Flag format: AKCTF25{username+password}

## Difficulty
Easy

## Hint
N/A

## Attachments
admin_footprint.pcap

## Solution
filter http
Follow HTTP Stream for packet No. 40
find the username and password
