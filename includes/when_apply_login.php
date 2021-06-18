<h4>Already have an account? Sign in to apply:</h4>
                     <!--   <form method="post" role="form" action="job_details.php?job_id=<?php // echo $job_id1; ?>">  -->
                        <table class="table table-condensed">
                        <tr>
                            <td><input type="text" name="username" id="email" class="form-control" placeholder="Email" /></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="userpass" id="password" class="form-control" placeholder="Password"/></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="hidden" id="hidden" class="form-control" value="<?php echo $job_id1; ?>"/></td>
                        </tr>
                        <tr>
                            <td id="error" style="color: #F00; font-size: 12px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="login" id="login" class="btn btn-primary" value="Sign In" />
                                <span style="color: #390; font-size: 12px;"><a href="#">Forgot Password?</a></span>
                            </td>
                        </tr>
                        </table>
                        </form>