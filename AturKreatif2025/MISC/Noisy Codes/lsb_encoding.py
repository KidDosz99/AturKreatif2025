import wave

audio = wave.open("base_audio.wav", 'rb')
frame_bytes = bytearray(list(audio.readframes(audio.getnframes())))

flag = "13 6 2 20 21 _ 20 10 8 15 10 7 10 4 2 15 21 _ 3 22 21 _ 13 16 22 5"
filler_char = "*"

total_chars = len(frame_bytes) // 8
filler_amt = total_chars - len(flag)

if filler_amt > 0:
    padded_flag = ""
    for i, char in enumerate(flag):
        padded_flag += char
        if i < filler_amt:
            padded_flag += filler_char * (filler_amt // len(flag) + (i < filler_amt % len(flag)))
    
    flag = padded_flag

bits = list(map(int, ''.join(bin(ord(i))[2:].zfill(8) for i in flag)))

for i, bit in enumerate(bits):
    frame_bytes[i] = (frame_bytes[i] & 254) | bit

frame_mod = bytes(frame_bytes)

with wave.open("noisy_codes.wav", 'wb') as f:
    f.setparams(audio.getparams())
    f.writeframes(frame_mod)

audio.close()