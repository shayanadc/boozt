import * as React from "react";
import TextField from "@mui/material/TextField";
import { StaticDateRangePicker } from "@mui/x-date-pickers-pro/StaticDateRangePicker";
import { AdapterDateFns } from "@mui/x-date-pickers/AdapterDateFns";
import { LocalizationProvider } from "@mui/x-date-pickers/LocalizationProvider";
import Box from "@mui/material/Box";
import moment from "moment";
import { Button } from "@mui/material";

export default function StaticDateRangePickerDemo({ setvalueHandler }) {
  const [value, setValue] = React.useState([null, null]);
  const [first, setFirst] = React.useState(true);

  React.useEffect(() => {
      if(first) {

      fetch(`http://localhost:8082/`)
          .then(response => response.json())
          .then(data => {
              setFirst(false)
              setvalueHandler(data.revenue, data.orders, data.customers);
          });
  }
  }, [setvalueHandler, setFirst, first]);

  const callAPI = () => {
    fetch(
      `http://localhost:8082/?orders=1&customers=1&revenue=1&to=${value[1]}&from=${value[0]}`
    )
      .then(response => response.json())
      .then(data => {
        setvalueHandler(data.revenue, data.orders, data.customers);
      });
  };

  return (
    <>
      <LocalizationProvider dateAdapter={AdapterDateFns}>
        <StaticDateRangePicker
          displayStaticWrapperAs="desktop"
          value={value}
          onChange={newValue => {
            setValue([
              moment(newValue[0]).format("YYYY-MM-DD"),
              moment(newValue[1]).format("YYYY-MM-DD")
            ]);
          }}
          renderInput={(startProps, endProps) => (
            <React.Fragment>
              <TextField {...startProps} />
              <Box sx={{ mx: 2 }}> to </Box>
              <TextField {...endProps} />
            </React.Fragment>
          )}
        />
      </LocalizationProvider>
      <Button fullWidth onClick={callAPI} variant="outlined">
        Submit
      </Button>
    </>
  );
}
