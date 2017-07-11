<script>
    $itr=1;
    function add() {
    var table = document.getElementById("first");
    var row = table.insertRow(7);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = '<td><textarea wrap="on" cols="30" rows="5" type="text" name="Description'+$itr+'">Enter Description</textarea></td>';
    cell2.innerHTML = '<input type="text" name="Quantity'+$itr+'" /></td></tr>';
    $itr++;
    document.getElementById("rows").innerHTML = $itr;
}
</script>