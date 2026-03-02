CREATE TABLE Users (
    userid SERIAL PRIMARY KEY,
    name VARCHAR(50),
    phone VARCHAR(20),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    admin BOOLEAN DEFAULT false
);

CREATE TABLE Orders (
    orderid SERIAL PRIMARY KEY,
    userid INTEGER,
    completed BOOLEAN DEFAULT false,
    datec DATE,
    FOREIGN KEY (userid) REFERENCES Users(userid) ON DELETE CASCADE
);

CREATE TABLE Parts (
    partid SERIAL PRIMARY KEY,
    namepart VARCHAR(200),
    descr VARCHAR(2000),
    price NUMERIC(10,2),
    stock INTEGER,
    img VARCHAR(255)
);

CREATE TABLE Orderpart(
    id SERIAL PRIMARY KEY,
    orderid INTEGER,
    partid INTEGER,
    FOREIGN KEY (orderid) REFERENCES Orders(orderid) ON DELETE CASCADE,
    FOREIGN KEY (partid) REFERENCES Parts(partid)
);
