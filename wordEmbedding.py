# import gensim
# from sklearn.metrics.pairwise import cosine_similarity

# model = gensim.models.fasttext.load_facebook_model('cc.en.300.bin')

# sentence = ['bench', 'needs', 'repairing']
# concept = "maintenance"

# wordEmbeddings = [model.wv[word] for word in sentence if word in model.wv]
# sentenceEmbedding = sum(wordEmbeddings) / len(wordEmbeddings)

# maintenanceVector = model.wv["maintenance"]

# similarityScore = cosine_similarity([sentenceEmbedding], [maintenanceVector])

# print("Similarity is:")
# print(similarityScore[0][0])

import gensim
from sklearn.metrics.pairwise import cosine_similarity
import spacy #Used for preprocessing the data
import pathlib #Used for reading the data
import datetime

#FILE READING

#Fetching data from file
filePath = "feedbackData.txt"
fileData = pathlib.Path(filePath).read_text(encoding="utf-8")

#Separating the data into lines
lines = fileData.splitlines()

#Separating each line into tokens
nlp = spacy.load("en_core_web_sm")
nlpLines = []

for line in lines:
  doc = nlp(line)
  nlpLines.append(doc)

#PREPROCESSING

preprocessedLines = []

for doc in nlpLines: #Iterate through each doc object
  preprocessedLine = []
  for token in doc: #iterate through each token

    #Remove stop words
    if token.is_stop:
    #   print(token,"was removed for being a stop word")
      continue

    #Remove punctuation
    elif token.is_punct:
    #   print(token,"was removed for being puntuation")
      continue

    #Removes whitespace, converts uppercase lettes to lowercase and returns the lemma of the letter (discussed above)
    # print('Token being processed: ', token)
    preprocessedToken = token.lemma_.strip().lower()
    # print('Preprocessed token: ', preprocessedToken)

    preprocessedLine.append(preprocessedToken)

  preprocessedLines.append(preprocessedLine)

print(preprocessedLines)

#MAIN TRAINING LOOP
model = gensim.models.fasttext.load_facebook_model('cc.en.300.bin')

maintenanceVector = (model.wv["maintenance"] + model.wv["fix"] + model.wv["broken"]) / 3.0
print("The maintenance vector is: ", maintenanceVector)

for line in preprocessedLines:
	print(line)
	
	wordEmbeddings = [model.wv[word] for word in line if word in model.wv]
	sentenceEmbedding = sum(wordEmbeddings) / len(wordEmbeddings)

	similarityScore = cosine_similarity([sentenceEmbedding], [maintenanceVector])

	print("Similarity is:")
	print(similarityScore[0][0])
