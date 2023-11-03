$interest
echo "enter the principal amount: "
read p
echo "enter the rate of interest: "
read r
echo "enter the time in years: "
read t
interest=$((($p*$r*$t)/100))
echo "interest: $(($interest))"
