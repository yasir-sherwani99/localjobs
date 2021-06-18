<h4>Already have an account? Sign in to apply:</h4>
                        <form method="post" action="job_details.php?job_id=<?php echo $job_id1; ?>">
                        <table class="table table-condensed">
                        <tr>
                            <td><input type="text" name="username" class="when_apply_fields" placeholder="Email" /></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="userpass" class="when_apply_fields" style="width:200px;" placeholder="Password"/></td>
                        </tr>
                        <tr>
                            <td id="error" style="color: #F00; font-size: 12px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="login" id="login" value="Sign In" />
                                <span style="color: #390; font-size: 12px;"><a href="#">Forgot Password?</a></span>
                            </td>
                        </tr>
                        </table>
                        </form>
