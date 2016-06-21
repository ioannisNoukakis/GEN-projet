#!/bin/bash

# Generate client public/private key pair into private keystore
echo Generating client public private key pair
keytool -genkey -alias clientprivate -keystore client.private -storetype JKS -keyalg RSA -dname "CN=Ioannis Noukakis, OU=HEIG-VD, O=HEIG-VD, L=Yverdon-les-Bains, S=VAUDe, C=CH" -storepass triton12 -keypass triton12

# Generate server public/private key pair
echo Generating server public private key pair
keytool -genkey -alias serverprivate -keystore server.private -storetype JKS -keyalg RSA -dname "CN=Ioannis Noukakis, OU=HEIG-VD, O=HEIG-VD, L=Yverdon-les-Bains, S=VAUDe, C=CH" -storepass triton12 -keypass triton12

# Export client public key and import it into public keystore
echo Generating client public key file
keytool -export -alias clientprivate -keystore client.private -file temp.key -storepass triton12
keytool -import -noprompt -alias clientpublic -keystore client.public -file temp.key -storepass public
rm -f temp.key

# Export server public key and import it into public keystore
echo Generating server public key file
keytool -export -alias serverprivate -keystore server.private -file temp.key -storepass triton12
keytool -import -noprompt -alias serverpublic -keystore server.public -file temp.key -storepass public
rm -f temp.key
