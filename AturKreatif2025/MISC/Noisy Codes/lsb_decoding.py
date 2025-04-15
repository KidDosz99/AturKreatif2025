import wave

audio = wave.open("noisy_codes.wav", 'rb')

frame_bytes = bytearray(list(audio.readframes(audio.getnframes())))

extracted_bits = [frame_bytes[i] & 1 for i in range(len(frame_bytes))]

extracted_bytes = bytearray(
    int("".join(map(str, extracted_bits[i:i+8])), 2) for i in range(0, len(extracted_bits), 8))

flag = extracted_bytes.decode(errors='ignore')

flag = flag.replace("*", "")

print(f"Extracted from LSB: {flag}")
audio.close()