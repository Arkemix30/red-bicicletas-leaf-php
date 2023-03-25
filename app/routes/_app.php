<?php

app()->get("/", function () {
    response()->json(["message" => "Congrats!! You're on Leaf API"]);
});

// This is the same as:
app()->resource("/bikes", "BikeController");


app()->get("/app", function () {
    // app() returns $app
    response()->json(app()->routes());
});
