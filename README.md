# Array Sorter Website
A website that sorts arrays. That's it.

## Parameters
- **a**
  - the json encoded array to sort
  - `http://array-sorter.appspot.com/?a=[1,3,2,10,11,9]` returns `[1,2,3,9,10,11]`
- **t**
  - the sorting type (numeric, alphabetic, etc.); numeric is the default
  - options: n (numeric), a (alphabetic + case-insensitive)
  - `http://array-sorter.appspot.com/?a=["a","B","d","c",1,2,"1","2"]&t=n` returns `["1","2","B","a","c","d",1,2]`
  - `http://array-sorter.appspot.com/?a=["a","B","d","c",1,2,"1","2"]&t=a` returns `[1,"1",2,"2","a","B","c","d"]`
- **d**
  - the direction to sort (ascending or descending); ascending is the default
  - options: a (ascending), d (descending)
  - `http://array-sorter.appspot.com/?a=["a","B","d","c",1,2,"1","2"]&t=a&d=d` returns `[2,1,"d","c","a","B","2","1"]`

## Exit codes
0 - success
1 - array not provided
2 - array is null and not a valid array

## Todo
- be able to pass a sorting function as a parameter
