from Crypto.Util.number import getPrime, inverse, bytes_to_long
import random

p = getPrime(512)
q = getPrime(512)
n = p * q
e = 65537

phi = (p - 1) * (q - 1)
d = inverse(e, phi)

flag = b"Recover this message to get the flag: AKCTF25{crt_d3crypt10n_g0ne_wr0ng}"
m = bytes_to_long(flag)
c = pow(m, e, n)

dp = d % (p - 1)
dq = d % (q - 1)
qinv = inverse(q, p)

m1 = pow(c, dp, p)
m2 = pow(c, dq, q)
# h = (qinv * (m1 - m2)) % p
# m_correct = (m2 + h * q) % n

m1_faulty = (m1 + random.randint(1, 1000)) % p 
h_faulty = (qinv * (m1_faulty - m2)) % p
m_faulty = (m2 + h_faulty * q) % n

with open("output.txt", "w") as f:
    f.write(f"n = {n}\n")
    f.write(f"e = {e}\n")
    f.write(f"c = {c}\n")
    f.write(f"m_faulty = {m_faulty}")
