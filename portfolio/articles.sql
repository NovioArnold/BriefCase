CREATE TABLE IF NOT EXISTS articles (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    articleName VARCHAR(255) NOT NULL,
    articleLink VARCHAR(255) NOT NULL,
    articleImageLink VARCHAR(255),
    articleDocumentationLink VARCHAR(255),
    topic_id INTEGER NOT NULL,
    subject_id INTEGER NOT NULL,
    FOREIGN KEY (topic_id) REFERENCES topics (id) ON DELETE CASCADE,
    FOREIGN KEY (subject_id) REFERENCES subjects (id) ON DELETE CASCADE
);