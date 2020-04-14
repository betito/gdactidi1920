import sys 
 
fp = open(sys.argv[1], 'r')  
file_content = fp.read()
file_content = file_content.decode("ascii", errors="replace")
#non ascii chars are replaced with the U+FFFD replacement character
output = open("teste_filter.txt", "w")
# non ascii chars are replaced with a question mark "?"
output.write(file_content)
output.close()
